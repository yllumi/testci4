<script>
    Alpine.data('checkout', (token) => ({
        title: "Checkout",
        token: token,
        cart: [],
        subtotal: 0,
        adminFee: 0,
        total: 0,
        paymentMethods: [],
        paymentMethodCategories: [],
        methodChosen: null,

        showMoreItems: false,
        modalInstance: null,
        submitCheckout: false,

        init() {
            document.title = this.title;
            Alpine.store('core').currentPage = 'checkout'

            $heroicHelper.fetch('/checkout/supply/' + this.token)
                .then(response => {
                    if (response.data.found == 0) {
                        // Remove query string from URL
                        window.history.replaceState({}, document.title, window.location.pathname);
                        return window.PineconeRouter.navigate('/iuran')
                    }

                    this.paymentMethods = response.data.paymentMethods
                    this.paymentMethodCategories = response.data.paymentMethodCategories

                    this.cart = response.data.items
                    this.subtotal = response.data.subtotal
                    this.total = response.data.subtotal
                })
        },

        convertRupiah(amount) {
            return amount.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
        },

        setPaymentMethod(method) {
            this.methodChosen = method
            const paymentFeeType = this.paymentMethods[this.methodChosen].paymentFeeType
            this.adminFee = paymentFeeType == 'fixed' ?
                this.paymentMethods[this.methodChosen].paymentFeeForCustomer :
                Math.round(this.paymentMethods[this.methodChosen].paymentFeeForCustomer / 100 * this.subtotal);
            this.total = this.subtotal + this.adminFee

            // Close modal
            const modal = document.getElementById('choosePaymentMethodModal')
            this.modalInstance = window.bootstrap.Modal.getOrCreateInstance(modal)
            this.modalInstance.hide()
        },

        async doCheckout() {
            this.submitCheckout = true
            const confirmedBoolean = await Prompts.confirm('Lanjutkan pembayaran dengan metode ' + this.paymentMethods[this.methodChosen].label + '?')
            if (confirmedBoolean) {
                const formData = new FormData();
                formData.append("method", this.methodChosen);
                formData.append("token", this.token);
                axios
                    .post("/checkout", formData, {
                        headers: {
                            "Content-Type": "multipart/form-data",
                            "Authorization": "Bearer " + window.localStorage.getItem("heroic_token"),
                        },
                    })
                    .then(response => {
                        window.console.log(response)
                        if (response.data.found == 1) {
                            window.location.replace(response.data.result.invoice_url)
                        }
                    })
                    .catch((error) => console.log(error))
            } else {
                this.submitCheckout = false
            }
        }
    }))
</script>