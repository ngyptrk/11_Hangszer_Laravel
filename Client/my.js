const { createApp } = Vue

createApp({
    data() {
        return {
            message: 'Hello Vue!',
            urlApi: 'http://localhost:8000/api',
            rows: [],

        }
    },
    methods: {
        async getProducts() {
            const url = `${this.urlApi}/instruments`
            try {
                const response = await fetch(url);
                if (!response.ok) {
                    throw new Error(`Response status: ${response.status}`);
                }

                const result = await response.json();
                console.log(result.data);
            } catch (error) {
                console.error(error.message);
            }
        },

         async postProducts() {
            const url = `${this.urlApi}/instruments`
            const method = "POST"
            const body = JSON.stringify(data) //obj == json
            const headers = {
                "Accept": "application/json",
                "Content-Type": "application/json"}
            try {
                const response = await fetch(url, method, headers, body);
                if (!response.ok) {
                    throw new Error(`Response status: ${response.status}`);
                }

                const result = await response.json();
                console.log(result.data);
            } catch (error) {
                console.error(error.message);
            }
        },

        onClickButtonTermekek() {
            this.getProducts()
        },

        onClickButtonPost() {
            const data = {
                name: "f3333",
                description: "Kézzwl termelt egeszseg",
                brand: "https",
                price: 8000,
                quantity: 22
            };
            this.postProducts();
        }
    }
}).mount('#app')