<template>
    <div>
        <button v-if="saveBtn" class="btn btn-info" @click.prevent="saveAd()">Sauvegarder l'annonce</button>
        <p v-else class="alert alert-success">
        Annonce sauvegarder !
        </p>
    </div>
</template>

<script>

export default{
    props:['adId','userId'],
    data(){
        return{
            saveBtn:true,
        }
    },
    methods:{
       
        saveAd(){
            axios.post('/ad/save',{
                adId:this.adId,
                userId:this.userId
            }).then((response)=>{
  
                this.saveBtn=false
               
            }).catch((err)=>{
                alert('Error!')
            })
        }
    }


}

</script>