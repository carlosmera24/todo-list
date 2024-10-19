<script>
    //Import url from store
    import { useUrlsStore } from '../stores/urls';
    //Import texts from store
    import { useTextsStore } from '../stores/texts';

    export default {
        setup(){
            const storeUrls = useUrlsStore();
            const storeTexts = useTextsStore();
            return { storeUrls, storeTexts };
        },
        props: {
            newTask: {
                type: Object,
                required: false,
            }
        },
        data() {
            return {
                tasks: [],
            }
        },
        watch: {
            newTask(){
                this.addTaskToList();
            }
        },
        mounted() {
            this.getTasks();
        },
        methods: {
            getTasks() {
                let url = this.storeUrls.tasks.index;
                axios.post(url)
                    .then( response => {
                        this.tasks = response.data.tasks;
                    },
                    error => {
                        this.$buefy.toast.open({
                            duration: 5000,
                            message: error,
                            position: 'is-top',
                            type: 'is-danger'
                        })
                    })
                    .then( () => {
                        //TODO: Close loading
                    });
            },
            addTaskToList(){
                if( this.newTask )
                {
                    this.tasks.push(this.newTask);
                    this.$emit('actionCleanNewTask');
                }
            }
        },
    }
</script>
<template>
    <section class="panel is-link">
        <p class="panel-heading">
            <b-icon
                icon="list-check"
                size="is-medium" />
            <span class="title">
                {{ storeTexts.home.list_tasks }}
            </span>
        </p>
        <article
            class="panel-block"
            v-for="(task,index) in tasks"
            :key="'task-item-'+ index"
            >
            <span class="panel-icon">
                <b-icon
                icon="book-open"
                size="is-small"/>
            </span>
            {{ task.name }}
        </article>
    </section>
</template>
<style lang="scss" scoped>
    .panel-heading{
        span.title{
            color: #fff;
            text-transform: uppercase;
        }
    }
</style>
