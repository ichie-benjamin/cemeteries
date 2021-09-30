<template>
    <div class="content-body">


        <!-- Menu Accordions start here -->
        <section id="accordion-with-margin">
            <draggable class="drag-area row" :list="categories" :options="{animation:200, group:'status'}" :element="'div'"  @change="updateCat()">

            <div class="row" v-for="item in categories" :key="'cat_'+item.id">
                <div class="col-sm-12">
                    <div class="accordion accordion-margin accordion-without-arrow" id="accordionMargin" data-toggle-hover="true">
                        <div class="accordion-item" id="heading-1">
                            <div class="row">
                                <div class="col-md-9">
                                    <h2 class="accordion-header" id="headingMarginOne">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" :data-bs-target="'#'+item.slug" aria-expanded="false" aria-controls="accordionMarginOne">

                                            <feather-icon icon="MenuIcon" />
                                            &nbsp;{{ item.name  }}
                                        </button>
                                    </h2>
                                </div>
                                <div class="col-md-3 accordion-buttons mt-1 mb-1">
                                              <span @click="showAddMenu(item)">
                                                <a type="button" class="btn btn-primary green-bg waves-effect waves-float waves-light" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Add menu item">
                                                    <feather-icon class="mr-1" icon="PlusIcon" />
                                                </a>
                                                </span>
                                    <span @click="editCat(item)">
                                                  <a type="button" class="btn btn-primary blue-bg waves-effect waves-float waves-light" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Edit this category">
                                                      <feather-icon class="mr-1" icon="EditIcon" />
                                                  </a>
                                                  </span>
                                    <span @click="deleteCat(item)" data-bs-target="#">
                                                    <a type="button" class="btn btn-primary red-bg waves-effect waves-float waves-light" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Delete this category">
                                                        <feather-icon class="mr-1" icon="Trash2Icon" />
                                                    </a>
                                                    </span>
                                </div>
                            </div>

                            <div :id="item.slug" class="accordion-collapse collapse" aria-labelledby="headingMarginOne" data-bs-parent="#accordionMargin" style="">
                                <div v-if="item.menus.length > 0" class=" menu-items-row match-height">

                                    <draggable class="drag-area row" :list="item.menus" :options="{animation:200, group:'status'}" :element="'div'" @change="update(item.menus, item.id)">
                                    <div  v-for="menu in item.menus" class="col-md-3" :key="menu.id" :data-id="menu.id">
                                        <div class="card">
                                            <div class="card-header">
                                                <h4 class="card-title"> {{ menu.name }}</h4>
                                                <div class="dropdown">
                                                    <button type="button" class="btn btn-sm dropdown-toggle hide-arrow" data-bs-toggle="dropdown">

                                                        <feather-icon icon="MoreVerticalIcon" />
                                                    </button>
                                                    <div class="dropdown-menu">
                                                        <a @click="addSide(menu)" class="dropdown-item">
<!--                                                            <i data-feather="plus" class="me-50 no-bg-feather-plus"></i>-->
                                                            <feather-icon class="me-50 no-bg-feather-plus" icon="PlusIcon" />
                                                            <span>Add Sides/Flavors</span>
                                                        </a>
                                                        <a @click="editMenu(menu)" class="dropdown-item">

                                                            <feather-icon class="me-50" icon="Edit2Icon" />
                                                            <span>Edit</span>
                                                        </a>
                                                        <a class="dropdown-item" href="#" @click="deleteMenu(menu)">
                                                            <feather-icon class="mr-1" icon="Trash2Icon" />
                                                            <span>Delete</span>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-body draggable">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <img :src="menu.img" class="menu-item-img">
                                                    </div>
                                                    <div class="col-md-8">

                                                        <p v-if="menu.sub_category" class="mb-0 font-weight-bold">Sub-Cat: <span class="font-weight-normal"> {{  menu.subcat }} </span> </p>
                                                        <p class="mb-0 font-weight-bold">Price: <span class="font-weight-normal"> ${{ menu.price }} </span>  </p>
                                                        <p class="mb-0 font-weight-bold">Sides: <span class="font-weight-normal"> ({{ menu.side_ids.length}}) </span>  </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    </draggable>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            </draggable>
        </section>

        <!-- Menu Accordions end here -->

        <!-- Add menu item modal starts here-->
        <div ref="add_menu" class="modal fade" id="addMenuItemModal" tabindex="-1" aria-labelledby="addMenuMenuItemModalTitle" style="display: none;" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" v-if="is_edit">  Edit selected menu item</h5>
                        <h5 class="modal-title" v-else> Add new Menu Item </h5>
                        <button @click="is_edit = false" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form @submit.prevent="submitMenu" method="POST" class="form-parsley">
                        <div class="row">
                            <div class="mb-1 col-md-9">
                                <label class="form-label" for="basicInput">Menu Item name</label>
                                <input type="text" class="form-control" v-model="formMenu.name" required>
                            </div>
                            <div class="mb-1 col-md-3">
                                <label class="form-label" for="basicInput"> Item Price</label>
                                <input type="text" v-model="formMenu.price" class="form-control" id="basicInput" required>
                            </div>
                        </div>
                        <div class="mb-1">
                            <label class="form-label" for="exampleFormControlTextarea1">Menu Item Description (Optional)</label>
                            <textarea v-model="formMenu.description" class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Description"></textarea>
                        </div>

                        <div class="row" v-if="formMenu.all_sub_cats.length > 0">
                            <div class="mb-1 col-md-6" >
                                <label class="form-label" for="basicSelect"> Select Sub-Category </label>
                                <select v-model="formMenu.sub_category_id" class="form-select" id="basicSelect">
                                    <option v-for="sub in formMenu.all_sub_cats" :value="sub.id">{{  sub.name  }}</option>
                                </select>
                            </div>
                        </div>

                        <h5 class="mt-1 mb-1"> Select Options for the customer </h5>
                        <div class="form-check form-switch mb-1">
                            <input v-model="formMenu.available_on_menu" type="checkbox" class="form-check-input" id="customSwitch1">
                            <label class="form-check-label" for="customSwitch1"> Make this Item available on the menu</label>
                        </div>
                        <div class="form-check form-switch mb-1">
                            <input type="checkbox" v-model="formMenu.pay_tru_menu" class="form-check-input" id="customSwitch2">
                            <label class="form-check-label" for="customSwitch2"> Customers can pay for this item through the menu</label>
                        </div>
                        <div class="form-check form-switch mb-1">
                            <input v-model="formMenu.send_order_notification" type="checkbox" class="form-check-input" id="customSwitch3">
                            <label class="form-check-label" for="customSwitch3">Customers can send order notifications only</label>
                        </div>
                        <div class="form-check form-switch mb-1">
                            <input type="checkbox" v-model="formMenu.cant_order" class="form-check-input" id="customSwitch4">
                            <label class="form-check-label" for="customSwitch4"> Customers can only view item (no ordering/paying)</label>
                        </div>


                        <div class="d-grid mb-1">
                            <button type="submit" class="btn btn-primary waves-effect waves-float waves-light">{{ is_edit ? 'Update' : 'Save' }}</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Add menu item modal ends here-->


        <!-- Select Flavors/Sides modal starts here-->
        <div ref="add_side" class="modal fade" id="selectFlavorsandSidesModal" tabindex="-1" aria-labelledby="selectFlavorsandSidesModalTitle" style="display: none;" aria-hidden="true">
            <div v-if="selected_menu" class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="selectFlavorsandSidesModalTitle" v-if="selected_menu.name"> Select Sides or Flavors for {{ selected_menu.name}}</h5>

                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body pt-0">
                        <div class="card-body p-0">
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="sides-tab" data-bs-toggle="tab" href="#sides" aria-controls="sides" role="tab" aria-selected="true">Sides</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="flavors-tab" data-bs-toggle="tab" href="#flavors" aria-controls="flavors" role="tab" aria-selected="false">Flavors</a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active" id="sides" aria-labelledby="sides-tab" role="tabpanel">
                                    <p v-if="sides.length > 0">
                                        Please select your sides.
                                    </p>
                                    <p v-else>
                                        No sides added to this menu item
                                    </p>
                                    <div class="form-check mb-1" v-for="side in sides">
                                        <input :value="side.id" v-model="selected_sides" class="form-check-input" type="checkbox" :id="'side'+side.id">
                                        <label class="form-check-label" :for="'side'+side.id">{{ side.name}}</label>
                                    </div>

                                    <div class="d-grid mt-1 mb-1" v-if="sides.length > 0">
                                        <button @click="saveSides" type="submit" class="btn btn-primary waves-effect waves-float waves-light">Save</button>
                                    </div>
                                </div>
                                <div class="tab-pane" id="flavors" aria-labelledby="flavors-tab" role="tabpanel">
                                    <p v-if="flavors.length > 0">
                                        Please select your flavors.
                                    </p>
                                    <p v-else>
                                        No flavor added to this menu yet
                                    </p>


                                        <div  v-for="flavor in flavors" class="form-check mt-1">
                                            <input :value="flavor.id" v-model="selected_flavors" class="form-check-input" type="checkbox" :id="'flavor'+flavor.id">
                                            <label class="form-check-label" :for="'flavor'+flavor.id">{{ flavor.name }}</label>
                                        </div>


                                    <div class="d-grid mt-1 mb-1" v-if="flavors.length > 0">
                                        <button @click="saveFlavors" type="submit" class="btn btn-primary waves-effect waves-float waves-light">Save</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Select Flavors/Sides modal ends here-->


        <div ref="delete_menu"  class="modal fade" tabindex="-1"
             aria-labelledby="deleteRestaurantModalTitle" style="display: none;" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteRestaurantModalTitle"> Are you sure you want to delete this menu item? </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" @submit.prevent="deleteMenuItem" accept-charset="UTF-8">
                            <input name="_method" value="DELETE" type="hidden">
                            <div class="mb-1">
                                <p> Deleting this menu means you will loose all the data you previously saved under this menu. </p>
                                <div class="mb-1 text-md-end">
                                    <button type="button" class="btn btn-primary-outline waves-effect waves-float waves-light" data-bs-dismiss="modal">Cancel</button>

                                    <button type="submit" class="btn btn-primary red-bg waves-effect waves-float waves-light" >Yes, delete it</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div ref="delete_cat"  class="modal fade" tabindex="-1"
              style="display: none;" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title"> Are you sure you want to delete this menu category? </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" @submit.prevent="deleteCategory" accept-charset="UTF-8">
                            <input name="_method" value="DELETE" type="hidden">
                            <div class="mb-1">
                                <p> By deleting this menu category you will loose all the data you previously saved under this menu category. </p>
                                <div class="mb-1 text-md-end">
                                    <button type="button" class="btn btn-primary-outline waves-effect waves-float waves-light" data-bs-dismiss="modal">Cancel</button>

                                    <button type="submit" class="btn btn-primary red-bg waves-effect waves-float waves-light" >Yes, delete it</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>



        <!-- Add menu category modal-->
        <div ref="category" class="modal fade" id="addMenuCategoryModal" tabindex="-1" aria-labelledby="addMenuCategoryModalTitle" style="display: none;" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addMenuCategoryModalTitle" v-if="is_edit"> Editing Menu Category </h5>
                        <h5 class="modal-title"  v-else> Add Menu Category </h5>
                        <button @click="is_edit = false; formCat = formCatRest" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form @submit.prevent="submitCategory" method="POST" class="form-parsley">

                        <div class="mb-1">
                            <label class="form-label" for="basicInput">Menu Category</label>
                            <input v-model="formCat.name" type="text" class="form-control" placeholder="Category" required>
                        </div>

                        <div class="mb-1">
                            <label class="form-label" for="exampleFormControlTextarea1">Category Description (Optional)</label>
                            <textarea v-model="formCat.description" class="form-control" rows="3" placeholder="Description"></textarea>
                        </div>

                        <div class="mb-1 row dynamic-input">
                            <label class="form-label" for="basicInput">Menu Sub-Categories for this Category (Optional)</label>
                            <div class="input-group">
                                <input type="text" v-model="subitem" class="form-control" placeholder="Sub-Category">
                                <button type="button" @click="saveSubCategory"  class="btn btn-primary green-bg waves-effect waves-float waves-light">
<!--                                    <i data-feather="plus"></i>-->
                                    <feather-icon icon="PlusIcon" />
                                </button>
                            </div>
                        </div>
                        <div class="mb-1 row dynamic-input" v-for="(i,index) in formCat.subcats">
                            <div class="input-group">
                                <input disabled :value="i" type="text" class="form-control" placeholder="Sub-Category">
                                <button type="button" @click="removeSubCat(i,index)" class="btn btn-primary red-bg waves-effect waves-float waves-light">
                                    <feather-icon class="me-50" icon="MinusIcon" />
                                </button>
                            </div>
                        </div>

                        <div class="d-grid mb-1">
                            <button type="submit" class="btn btn-primary waves-effect waves-float waves-light">Save</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal ends here-->


    </div>
</template>

<script>
import draggable from 'vuedraggable'
export default {
    components: {
        draggable,
    },
    props: ['cats', 'sides', 'flavors', 'save_sides', 'cat_url','save_flavors','store_menu_url','store_category_url','res'],
    name: "Menu",
    data() {
        return {
            categories: null,
            selected_menu: [],
            selected_cat: [],
            selected_sides: [],
            selected_flavors: [],
            subitem:'',
            is_edit : false,
            formMenu : {
                name : '',
                description : '',
                restaurant_id: this.res.id,
                price : '',
                all_sub_cats : [],
                sub_category_id:'',
                available_on_menu : false,
                pay_tru_menu : false,
                cant_order : false,
                send_order_notification : false,
            },
            formCat : {
                name : '',
                description : '',
                restaurant_id : this.res.id,
                subcats : [],
            },
            formCatRest : {
                name : '',
                description : '',
                subcats : [],
                restaurant_id : this.res.id,
            },
            formReset : {
                name : '',
                restaurant_id: this.res.id,
                description : '',
                all_sub_cats:[],
                price : '',
                available_on_menu : false,
                pay_tru_menu : false,
                cant_order : false,
                send_order_notification : false,
            }
        }
    },
    mounted() {
        this.categories = this.cats.data;
    },
    methods: {
        update(menus, cat_id) {
            menus.map((menu, index) => {
                menu.order = index + 1;
            });

            menus.map((menu, index) => {
                menu.order = index + 1;
            });
            axios.post('/menus/update/all/' + cat_id, {
                menus: menus
            }).then((response) => {
                console.log(response.data);
                toastr.success('Menu order successfully updated');
            }).catch((error) => {
                this.errorReload(error);
                console.log(error);
            })
        },

        updateCat() {
            this.categories.map((cat, index) => {
                cat.order = index + 1;
            });

            this.categories.map((cat, index) => {
                cat.order = index + 1;
            });
            axios.post('/categories/update/all/' + this.res.id, {
                cats: this.categories
            }).then((response) => {
                console.log(response.data);
                toastr.success('Category order successfully updated');
            }).catch((error) => {
                this.errorReload(error);
                console.log(error);
            })
        },


        deleteMenu(menu) {
            this.selected_menu = menu;
            let delete_menu = this.$refs.delete_menu
            $(delete_menu).modal('show')
        },
        deleteMenuItem() {
            axios.delete('/menu/' + this.selected_menu.id).then((res) => {
                this.getCategories();
                toastr.success('Menu Item successfully deleted');
                let delete_menu = this.$refs.delete_menu
                this.selected_menu = [];
                $(delete_menu).modal('hide')
            });
        },
        deleteCat(cat) {
            this.selected_cat = cat;
            let delete_cat = this.$refs.delete_cat
            $(delete_cat).modal('show')
        },
        deleteCategory() {
            axios.delete('/menu_cats/' + this.selected_cat.id).then((res) => {
                this.getCategories();
                toastr.success('Menu Category successfully deleted');
                let delete_cat = this.$refs.delete_cat
                this.selected_cat = [];
                $(delete_cat).modal('hide')
            });
        },
        editMenu(menu) {
            this.formMenu = menu;
            this.is_edit = true
            let add_menu = this.$refs.add_menu
            $(add_menu).modal('show')
        },
        editCat(cat) {
            this.formCat = cat;
            this.formCat.subcats = cat.cats;
            this.is_edit = true
            let category = this.$refs.category
            $(category).modal('show')
        },
        showAddMenu(item) {
            this.selected_cat = item;
            this.formMenu.all_sub_cats = item.categories;
            this.formMenu.menu_category_id = item.id;
            let add_menu = this.$refs.add_menu
            $(add_menu).modal('show')
        },
        submitMenu() {
            if (this.is_edit) {
                this.updateMenu();
            } else {
                this.saveMenu();
            }
        },
        submitCategory() {
            if (this.is_edit) {
                this.updateCategory();
            } else {
                this.saveCategory();
            }
        },
        saveMenu() {
            axios.post(this.store_menu_url, this.formMenu).then((res) => {
                this.formMenu = this.formReset;
                this.getCategories();
                toastr.success('Menu Item successfully added');
                let add_menu = this.$refs.add_menu
                $(add_menu).modal('hide')
            }).catch((error) => {
                this.errorReload(error);
                if (error.response.status === 422) {
                    this.errors = error.response.data.errors;
                }
            })
        },

        saveCategory() {
            axios.post(this.store_category_url, this.formCat).then((res) => {
                this.formCat = this.formCatRest;
                this.getCategories();
                toastr.success('Menu Category Item successfully added');
                let add_cat = this.$refs.category
                $(add_cat).modal('hide')
            }).catch((error) => {
                this.errorReload(error);
                console.log(error)
                if (error.response) {
                    if (error.response.status === 422) {
                        this.errors = error.response.data.errors;
                    }
                }
            })
        },

        saveSubCategory() {
            this.formCat.subcats.push(this.subitem)
            this.subitem = ''
            toastr.success('Sub category added');
        },

        removeSubCat(i, index) {
            this.formCat.subcats.splice(this.formCat.subcats.indexOf(index), 1);
            toastr.success('Sub category removed');
        },

        updateMenu() {
            axios.put('/menu/' + this.formMenu.id, this.formMenu).then((res) => {
                this.getCategories();
                this.is_edit = false;
                this.formMenu = this.formReset;
                toastr.success('Menu Item successfully updated');
                let add_menu = this.$refs.add_menu
                $(add_menu).modal('hide')
            }).catch((error) => {
                this.errorReload(error);
                if (error.response.status === 422) {
                    this.errors = error.response.data.errors;
                }
            })
        },
        updateCategory() {
            axios.put('/menu_cats/' + this.formCat.id, this.formCat).then((res) => {
                this.getCategories();
                this.is_edit = false;
                this.formCat = this.formCatRest;
                toastr.success('Menu Category successfully updated');
                let cat = this.$refs.category
                $(cat).modal('hide')
            }).catch((error) => {
                this.errorReload(error);
                if (error.response.status === 422) {
                    this.errors = error.response.data.errors;
                }
            })
        },

        selectMenu(item) {
            this.selected_menu = item;
        },
        saveSides() {
            axios.post(this.save_sides, {sides: this.selected_sides, menu_id: this.selected_menu.id}).then((res) => {
                this.getCategories();
                toastr.success('Menu sides successfully saved');
                let add_side = this.$refs.add_side
                $(add_side).modal('hide')
            }).catch((error) => {
                this.errorReload(error);
                if (error.response.status === 422) {
                    this.errors = error.response.data.errors;
                }
            })
        },
        saveFlavors() {
            axios.post(this.save_flavors, {
                flavors: this.selected_flavors,
                menu_id: this.selected_menu.id
            }).then((res) => {
                this.getCategories();
                toastr.success('Menu flavors successfully saved');
                let add_side = this.$refs.add_side
                $(add_side).modal('hide')
            }).catch((error) => {
                this.errorReload(error);
                if (error.response.status === 422) {
                    this.errors = error.response.data.errors;
                }
            })
        },
        addSide(item) {
            this.selected_menu = item;
            this.selected_sides = item.side_ids;
            this.selected_flavors = item.flavor_ids;
            if (this.selected_menu) {
                let add_side = this.$refs.add_side
                $(add_side).modal('show')
            }
        },
        getCategories() {
            axios.get(this.cat_url).then((res) => {
                this.categories = res.data;
            }).catch((error) => {
                this.errorReload(error);
                if (error.response.status === 422) {
                    this.errors = error.response.data.errors;
                }
            })
        },
        errorReload(error) {
            if (error.response.status === 419) {
                location.reload()
            }
        }
    }
}
</script>

<style scoped>

</style>
