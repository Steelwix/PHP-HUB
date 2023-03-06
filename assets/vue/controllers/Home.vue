

<template>
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h1>PHP HUB</h1>
                <p>All services, methods and templates made for you, <span v-if="user">{{ user
                }}</span><span v-else>dude</span></p>
            </div>

            <div class="bod">

                <div class="slider">

                    <!-- slide 1 -->

                    <div class="slider-items">
                        <div v-for="service in services">
                            <div class="slide card bg-dark col-12 mh-500 d-flex align-items-stretch">
                                <a href="" class=" text-decoration-none link-light">
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

                    <!-- Control buttons -->
                    <button class="btn btn-next"> <i class="bi bi-arrow-right-circle-fill"></i> </button>
                    <button class="btn btn-prev">
                        <i class="bi bi-arrow-left-circle-fill"></i> </button>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>

const props = defineProps({
    user: Object,
    services: Array
});

console.log(props.user)
</script>