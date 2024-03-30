<script setup>
import FormSale from '../components/FormSale.vue';
import TableSale from '../components/TableSale.vue';
import { mapGetters ,useStore } from 'vuex';
import {ref} from 'vue';
const store = useStore();
const styles = ref(store.getters.getStyle);

const postBtn = () => {
    return console.log(styles.value);
}

</script>
<template>
    <div class="content p-5">
        <FormSale />
        <div class="float-end">
            <button class="btn btn-outline-dark" @click="postBtn()">SAVE</button>
        </div>

    </div>
</template>
