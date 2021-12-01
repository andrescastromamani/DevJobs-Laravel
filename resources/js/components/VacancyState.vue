<template>
    <span
        class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full"
        :class="changeStyle()"
        @click="changeState"
        :key="stateVacancy"
    >{{ vacancyState }}</span>
</template>
<script>
export default {
    props: ['state', 'idvacancy'],
    mounted() {
        this.stateVacancy = Number(this.state);
    },
    data: function () {
        return {
            stateVacancy: null,
        };
    },
    methods: {
        changeStyle() {
            if (this.stateVacancy === 1) {
                return 'text-green-800 bg-green-100';
            } else {
                return 'text-red-800 bg-red-100';
            }
        },
        changeState() {
            if (this.stateVacancy === 1) {
                this.stateVacancy = 0;
            } else {
                this.stateVacancy = 1;
            }
            const params = {
                status: this.stateVacancy,
            };
            axios.post('/vacantes/' + this.idvacancy, params)
                .then(response => console.log(response))
                .catch(error => console.log(error));
        }
    },
    computed: {
        vacancyState() {
            if (this.stateVacancy === 1) {
                return 'Activo';
            } else {
                return 'Inactivo';
            }
        }
    }
}
</script>
