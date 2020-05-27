<template>
    <div id="wrapper">
        <Header />
        <Sidebar />
        <div class="content-page">
            <div class="content">
                <div class="container-fluid">
                    <Breadcrumb title="Dashboard" actived="Bienvenue dans le dashboard de la RAELMCA" />
                    Hello
                </div>
            </div>
        </div>
        <Footer />
    </div>
</template>

<script>
import Header from './components/layouts/Header'
import Sidebar from './components/layouts/Sidebar'
import Breadcrumb from './components/layouts/Breadcrumb'

export default {
    name: 'App',
    components: {
        Header,
        Sidebar,
        Breadcrumb
    }
}
</script>