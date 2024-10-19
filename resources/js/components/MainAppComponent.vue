<script>
    //Import url from store
    import { useUrlsStore } from '../stores/urls';
    //Import texts from store
    import { useTextsStore } from '../stores/texts';
    //Import NewTaskComponent
    import NewTaskComponent from './NewTaskComponent.vue';
    //Import ListTasksComponent
    import ListTasksComponent from './ListTasksComponent.vue';

    export default {
        setup(){
            const storeUrls = useUrlsStore();
            const storeTexts = useTextsStore();
            return { storeUrls, storeTexts };
        },
        components: {
            NewTaskComponent,
            ListTasksComponent
        },
        props: {
            urls_json: {
                type: String,
                required: true,
            },
            texts_json: {
                type: String,
                required: true,
            },
            locale: {
                type: String,
                required: true,
            },
        },
        data() {
            return {
                newTask: null,
            }
        },
        created() {
            this.initUrlsStore();
            this.initTextsStore();
        },
        methods: {
            initUrlsStore(){
                let urls = JSON.parse( this.urls_json );
                this.storeUrls.setUrls( urls );
            },
            initTextsStore(){
                let texts = JSON.parse( this.texts_json );
                this.storeTexts.setTexts( texts );
                this.storeTexts.setLocale( this.locale );
            },
            addNewTaskTolist( task ){
                this.newTask = task;
            },
            cleanNewTask(){
                this.newTask = null;
            }
        },
    }
</script>
<template>
    <div class="container">
        <div class="content">
            <h1>{{ storeTexts.home.main_title }}</h1>

            <NewTaskComponent
                v-on:actionAddNewTask="addNewTaskTolist"
                />

            <ListTasksComponent
                v-bind:newTask="newTask"
                v-on:actionCleanNewTask="cleanNewTask"
                />
        </div>
    </div>
</template>
