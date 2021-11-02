<template>
<div class="row">
    <div class="col-md-12 col-12">
        <form>
            <div class="col-6 mx-auto">
                <input v-model="name" :placeholder="placeholder" class="form-control" />
            </div>
        </form>
    </div>

    <div class="col-12 mt-4" v-if="cemeteries.length > 0">
        <div class="table-responsive">
            <table class="table">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Photo</th>
                    <th>Name</th>
                    <th>Address</th>
                    <th>Country / State</th>
                    <th>Featured</th>
                    <th>Memorials</th>
                    <th> Status</th>
                </tr>
                </thead>
                <tbody>

                <tr v-for="item in cemeteries">
                    <td>
                        <span class="fw-bold"> {{ item.id }} </span>
                    </td>
                    <td>
                        <img height="30px" width="50px" :src="item.image" />
                    </td>
                    <td> {{ item.name }} </td>
                    <td> {{ item.address }} </td>
                    <td> {{ item.country }} / {{ item.state }} </td>
                    <td> {{ item.featured ? 'Yes' : 'No' }} </td>

                    <td> <a href="#">{{ item.memorials_count }}</a></td>
                    <td> <a class="btn btn-success" href="#">Claim</a></td>

<!--                    <td class="d-flex">-->
<!--                        <span class="badge rounded-pill badge-light-success me-1"> active </span>-->
<!--                        <div class="dropdown">-->
<!--                            <button type="button" class="btn btn-sm dropdown-toggle hide-arrow" data-bs-toggle="dropdown">-->
<!--                                <i data-feather="more-vertical"></i>-->
<!--                            </button>-->
<!--                            <div class="dropdown-menu">-->
<!--                                <a class="dropdown-item" href="{{ route('admin.cemeteries.edit', item.id) }}">-->
<!--                                    <i data-feather="check-circle" class="me-50"></i>-->
<!--                                    <span>Edit</span>-->
<!--                                </a>-->
<!--                                <a class="dropdown-item" href="#">-->
<!--                                    <i data-feather="x-circle" class="me-50"></i>-->
<!--                                    <span>Disable</span>-->
<!--                                </a>-->

<!--                                <a type="button" class="dropdown-item"-->
<!--                                   data-bs-toggle="modal" data-bs-target="#deleteModal{{item.id}}">-->
<!--                                    <i data-feather="x-circle" class="me-50"></i>-->
<!--                                    <span>Delete</span>-->
<!--                                </a>-->


<!--                            </div>-->
<!--                        </div>-->
<!--                    </td>-->
                </tr>

                </tbody>
            </table>

        </div>
    </div>
</div>
</template>

<script>
export default {
name: "Search",
    props : ['url','placeholder'],
    data (){
        return {
            loading : false,
            name : '',
            cemeteries : [],
        }
    },
    methods : {
        search(){
            // this.cemeteries = [];
            this.loading = true;
            axios.post(this.url, {name:this.name}).then((res)=> {
                this.loading = false;
                if(res.data.status === 1){
                    this.cemeteries = res.data.data;
                }
            })
        }
    },
    watch : {
        name(){
            if(this.name.length > 3){
                if(!this.loading){
                    this.search();
                    console.log('searching')
                }
            }
        }
    }
}
</script>

<style scoped>

</style>
