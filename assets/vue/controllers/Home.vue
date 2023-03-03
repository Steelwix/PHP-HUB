<template>
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h1>PHP HUB</h1>
                <p>All you need about dev, {{ name }}</p>

                <div v-for="service in props.services">
                    <div class="card bg-dark col-12 mh-500 d-flex align-items-stretch">
                        <a href="" class=" text-decoration-none link-light">
                            <img class="card-img-top rounded"
                                src="https://perishablepress.com/wp/wp-content/images/2007/misc-chunks/syntax-highlight.png"
                                alt="Card image cap">
                            <div class="card-title text-center">
                                <p>
                                    <strong>{{ service.title }}</strong> by
                                    {{ service.creator }}
                                </p>
                                <p>released {{ service.release }}</p>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
const props = defineProps({
    name: String,
    services: Array
});
console.log(props.name),
    console.log(props.services)

</script>