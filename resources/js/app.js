require('./bootstrap');

function dataTableController (id) {
    return {
        id,
        deleteItem() {
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    Livewire.emit('deleteItem', this.id);
                }
            })
        }
    }
}

function dataTableMainController () {
    return {
        setCallback() {
            Livewire.on('deleteResult', (result) => {
                if (result.status) {
                    Swal.fire(
                        'Deleted!',
                        result.message,
                        'success'
                    );
                } else {
                    Swal.fire(
                        'Error!',
                        result.message,
                        'error'
                    );
                }
            });
        }
    }
}

window.__controller = {
    dataTableController,
    dataTableMainController
}
