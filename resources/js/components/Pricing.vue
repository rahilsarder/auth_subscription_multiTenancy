<template>
    <div>
        <div class="app align-content-stretch d-flex flex-wrap">
            <Sidebar />
            <div class="app-container">
                <div class="search">
                    <form>
                        <input
                            class="form-control"
                            type="text"
                            placeholder="Type here..."
                            aria-label="Search"
                        />
                    </form>
                    <a href="#" class="toggle-search"
                        ><i class="material-icons">close</i></a
                    >
                </div>
                <Topbar />
                <div class="app-content">
                    <div class="content-wrapper">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col">
                                    <div class="page-description text-center">
                                        <h1>Pricing Tables</h1>
                                        <span
                                            >Elegant, responsive and simple
                                            pricing tables.</span
                                        >
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div
                                    class="col-12 col-md-12 col-sm-offset-2 col-sm-10 col-lg-offset-2 col-lg-10 mx-auto"
                                >
                                    <div class="row">
                                        <div
                                            class="col-12 col-xl-4"
                                            v-for="price in pricing"
                                        >
                                            <div class="card pricing-basic">
                                                <div class="card-body">
                                                    <h3 class="plan-title">
                                                        {{ price.name }}
                                                    </h3>
                                                    <div class="plan-price">
                                                        <span
                                                            class="plan-price-value"
                                                            >${{
                                                                price.price
                                                            }}</span
                                                        >
                                                        <span
                                                            class="plan-price-period"
                                                            >/ month</span
                                                        >
                                                    </div>
                                                    <span
                                                        class="plan-description"
                                                        >Lorem ipsum dolor sit
                                                        amet, consectetur
                                                        adipisicing elit.</span
                                                    >
                                                    <ul class="plan-list">
                                                        <li>
                                                            Up to 10 Devices
                                                        </li>
                                                        <li>
                                                            250GB of SSD Storage
                                                        </li>
                                                        <li>
                                                            500GB Monthly
                                                            Bandwidth
                                                        </li>
                                                        <li>
                                                            50 Email Accounts
                                                        </li>
                                                        <li>
                                                            30 Form Submissions
                                                        </li>
                                                        <li>
                                                            24/7 Online Support
                                                        </li>
                                                    </ul>
                                                    <div class="m-t-md d-grid">
                                                        <button
                                                            class="btn btn-secondary btn-lg"
                                                            type="button"
                                                        >
                                                            Buy Now
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data: function () {
        return {
            pricing: [],
        };
    },

    mounted() {
        this.fetchPricing();
    },

    methods: {
        fetchPricing: function () {
            axios.get("/api/subscription").then((response) => {
                this.pricing = response.data;
            });
        },
    },
};
</script>
