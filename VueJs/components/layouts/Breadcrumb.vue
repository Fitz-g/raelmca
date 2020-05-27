<template>
    <div class="page-title-box">
        <div class="row align-items-center">
            <div class="col-sm-6">
                <h4 class="page-title">{{ title }}</h4>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active">{{ actived }}</li>
                </ol>
            </div>
            <!-- <div class="col-sm-6">
                <div class="float-right d-none d-md-block">
                        <div class="dropdown">
                        <button class="btn btn-primary dropdown-toggle arrow-none waves-effect waves-light" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="mdi mdi-settings mr-2"></i> Settings
                        </button>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <a class="dropdown-item" href="#">Something else here</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Separated link</a>
                        </div>
                        </div>
                    </div>
            </div> -->
        </div>
    </div>
</template>

<script>
export default {
    name: 'Breadcrumb',
    props: ['title', 'actived']
}
</script>