<template>
    <div class="col-xs-12 col-md-8 mx-auto mt-3" v-if="show">
        <div class="col-xs-12 mb-5">
            <div class="alert alert-dismissible alert-light py-3">
                <button type="button" class="close" @click="dismiss">&times;</button>
                <h6 class="mt-3">
                    <strong class="text-bold h6">{{level}}:</strong>  &nbsp; {{body}}
                </h6>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props:['message'],

    data(){
        return {
            show: true,
            body: '',
            level: '',
        }
    },
    methods: {
         dismiss(){
             this.hide();
         },
         hide(){
            //  this.isShowing = false;
         }
     },
    created(){
        if(this.message){
            this.body = this.message.message
            this.level = this.message.level
            this.show = true;
        }
    }
}
</script>
