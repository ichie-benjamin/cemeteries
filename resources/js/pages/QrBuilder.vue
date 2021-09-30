<template>
    <div class="row match-height">
        <div class="col-md-4 col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">  QR Code Generator </h4>
                </div>
                <div class="card-body">
                    <div class="row mb-1">
                        <div class="col-8">
                            <strong>Foreground Color </strong>
                        </div>
                        <div class="col-4 pull-right">
                            <ColourPicker v-model="form.color" :color="res.color" picker="sketch"/>
                        </div>
                    </div>
                    <div class="row mb-1">
                        <div class="col-8">
                            <strong>Background Color </strong>
                        </div>
                        <div class="col-4 pull-right">
                            <colour-picker
                                v-model="form.bg"
                                :color="res.bg"
                                picker="sketch" />
                        </div>
                    </div>
                    <div class="row mb-1">
                        <div class="col-12">
                            <label class="form-label">Padding </label>
                            <input type="range" v-model="form.padding" class="form-range" min="4" max="20">
                        </div>
                    </div>
                    <div class="row mb-1">
                      <div class="">
                          <label class="form-label">Mode</label>
                          <select v-model="form.type" class="form-control">
                              <option value="normal">Normal</option>
                              <option value="image">Image</option>
                          </select>
                      </div>
                    </div>
                    <div v-if="form.type === 'image'" class="row mb-1">
                      <div class="">
                          <label class="form-label">Upload Image</label>
                          <dropzone @vdropzone-sending="sending" @vdropzone-processing="processing" @vdropzone-success="vsuccess" ref="myVueDropzone" id="dropzone" :options="dropzoneOptions"></dropzone>
                      </div>
                    </div>
                    <div class="row" v-if="form.type === 'image'">
                        <div class="col-12">
                            <label for="customRange2" class="form-label">Size </label>
                            <input type="range" v-model="form.logo_scale" class="form-range" min="1" max="5" id="customRange2">
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4 col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">  QR Code </h4>
                </div>
                <div class="card-body">
                    <div class="row mb-1">
                        <vue-qr text="Hello" :callback="test" :margin="padding" :logoScale="scale" :colorDark="form.color" :backgroundColor="form.bg" :logoSrc="form.type === 'image' ? form.img : ''" :text="url" :size="200"></vue-qr>
                    </div>
                </div>
                <div class="card-footer">
                    <button @click="test" class="btn btn-danger">Download Image</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>

import ColourPicker from "vue-colour-picker";

// import { sketch } from 'vue-color'

// import { ColorPicker } from 'vue-color-gradient-picker';
import VueQr from 'vue-qr'
export default {
name: "QrBuilder",
    props : ['url','upload_url','res'],
    components: {
        VueQr,
        ColourPicker,
    },

    data () {
        return {
            loaded : false,
            form : {
                color: '',
                bg: '',
                img : '',
                padding : 4,
                logo_scale : 1,
                type : 'normal',
            },
            not_working:false,
            token : $('meta[name="csrf-token"]').attr('content'),
            dropzoneOptions: {
                url: this.upload_url,
                thumbnailWidth: 150,
                maxFiles: 1,
                dictDefaultMessage:'+ Upload Image',
                maxFilesize: 2.0,
                acceptedFiles: ".png,.jpeg,.jpg",
                addRemoveLinks: true,
                success: function (file, response) {
                    return response.image
                },
            },
        }
    },

    mounted () {
        this.loadForm()
    },
    methods : {
        test(dataUrl){
            console.log(dataUrl)
        },
        vsuccess (file, response) {
            this.form.img = response.image;
            this.not_working = false;
        },
        processing(file){
            this.not_working = true;
        },
        sending: function (file, xhr, formData) {
            formData.append('_token', this.token);
        },
        update(){
            if(this.loaded){
                axios.post('/update/qr', this.form).then((res)=>{
                    console.log(res.data)
                }).catch((error)=>{
                    if (error.response.status === 422){
                        this.errors = error.response.data.errors;
                    }
                })
            }

        },
        loadForm(){
            this.form.restaurant_id = this.res.restaurant_id;
            this.form.padding =  this.res.padding
            this.form.logo_scale =  this.res.logo_scale
            this.form.img =  this.res.img
            this.form.bg =  this.res.bg
            this.form.id =  this.res.id
            this.form.type =  this.res.type
            this.form.color =  this.res.color

            this.loaded = true
        }

    },
    computed : {
        scale(){
            return this.form.logo_scale / 5
        },
        padding(){
            return this.form.padding * 5
        }
    },
    watch : {
        form: {
            deep: true,
            handler(){
                    this.update();
            }
        }
    }
}
</script>

<style scoped>
.color-input {
    display: none!important;
}
</style>
