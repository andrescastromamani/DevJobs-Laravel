<template>
    <a href="#" class="text-red-500 hover:text-indigo-900 mx-2" @click="deleteVacancy">Eliminar</a>
</template>
<script>
export default {
    props: ['idvacancy'],
    methods: {
        deleteVacancy() {
            this.$swal.fire({
                title: '¿Deseas eliminar?',
                text: "No podras revertir esta accion!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, Eliminar!',
                cancelButtonText: 'Cancelar',
            }).then((result) => {
                    if (result.isConfirmed) {
                        const params = {
                            id: this.idvacancy,
                            _method: 'delete',
                        };
                        axios.post('/vacantes/' + this.idvacancy, params)
                            .then(response => {
                                console.log(response)
                                this.$swal.fire(
                                    'Eliminado!',
                                    response.data.success,
                                    'success'
                                );
                                this.$el.parentNode.parentNode.parentNode.removeChild(this.$el.parentNode.parentNode);
                            })
                            .catch(error => {
                                console.log(error)
                                this.$swal.fire(
                                    'Error!',
                                    'La vacante no ha sido eliminada.',
                                    'error'
                                );
                            });
                    }
                }
            );
        }
    }
}
</script>
