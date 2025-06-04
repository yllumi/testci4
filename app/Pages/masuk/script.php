<script>
  Alpine.data('login', () => {
    return {
      title: "Login",
      showPwd: false,
      errorMessage: null,
      buttonSubmitting: false,
      data: {
        username: "",
        password: "",
        logo: "",
        sitename: "",
      },
      sanboxLogin: {},

      async init() {
        // Place sandbox login if set
        this.sandboxLogin = JSON.parse(Alpine.store('core').settings.sandbox_login ? Alpine.store('core').settings.sandbox_login : "{}");
        if (this.sandboxLogin && Object.keys(this.sandboxLogin).length > 0) {
          this.data.username = this.sandboxLogin.username;
          this.data.password = this.sandboxLogin.password;
        }

        document.title = this.title;
        Alpine.store('core').currentPage = "login";;

        this.data.logo = Alpine.store('core').settings.auth_logo;
        this.data.sitename = Alpine.store('core').settings.app_title;
      },

      login() {
        this.errorMessage = "";
        this.buttonSubmitting = true;

        // Check login using axios post
        const formData = new FormData();
        formData.append("username", this.data.username);
        formData.append("password", this.data.password);
        axios
          .post("/masuk", formData, {
            headers: {
              "Content-Type": "multipart/form-data",
            },
          })
          .then((response) => {
            if (response.data.found == 1) {
              localStorage.setItem("heroic_token", response.data.jwt);
              Alpine.store('core').sessionToken = localStorage.getItem("heroic_token");

              setTimeout(() => {
                window.location.replace("/");
              }, 500);
            } else {
              this.buttonSubmitting = false;
              this.errorMessage = "Password tidak cocok atau akun belum terdaftar";
              setTimeout(() => (this.errorMessage = ""), 10000);
            }
          });
      },

    };
  });
</script>