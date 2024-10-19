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
        data() {
            return {
                newTask: '',
            }
        },
        computed: {
            isValid() {
                return this.newTask.length > 0;
            }
        },
        methods: {
            async addTask() {
                let url = this.storeUrls.tasks.create;
                let params = {
                    name: this.newTask
                };

                await axios.post(url, params)
                    .then( response => {
                        if( response.data.status == 201 )
                        {
                            this.newTask = '';
                            this.$emit('actionAddNewTask', response.data.task);

                            this.$buefy.toast.open({
                                duration: 5000,
                                message: this.storeTexts.messages.success.task_created,
                                position: 'is-top',
                                type: 'is-success'
                            })
                        }
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
            }
        }
    }
</script>
<template>
    <section class="box">
        <b-field
            :label="storeTexts.home.new_task"
            label-position="on-border"
            >
            <b-input
                :placeholder="storeTexts.home.new_task_placeholder"
                v-model="newTask"
                />
            <p class="control">
                <b-button
                    :label="storeTexts.home.add_task"
                    type="is-primary"
                    :disabled="!isValid"
                    @click="addTask()"
                    />
            </p>
        </b-field>
    </section>
</template>
