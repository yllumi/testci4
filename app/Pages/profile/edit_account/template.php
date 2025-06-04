<div id="member-profile-edit-account" x-data="profile_edit_account()" class="bg-primary">

    <div class="appHeader">
        <div class="left">
            <a href="javascript:void()" onclick="history.back()" class="headerButton">
                <i class="bi bi-chevron-left"></i>
            </a>
        </div>
        <div class="pageTitle">Edit Akun</div>
        <div class="right"></div>
    </div>

    <!-- App Capsule -->
    <div id="appCapsule" class="shadow">

        <div class="section full mt-1">
            <div class="section-title">Informasi Akun</div>

            <div class="wide-block pt-2 pb-2">

                <div class="form-group boxed">
                    <div class="text-start input-wrapper">
                        <label class="fw-bold" for="email">Email</label>
                        <input type="email" class="form-control" id="email" x-model="data.profile.email" disabled>
                    </div>
                </div>

                <div class="form-group mb-3">
                    <button type="button" data-bs-toggle="modal" data-bs-target="#ModalFormEmail" class="btn btn-outline-secondary btn-sm" @click="generateToken('email')">Ganti Alamat Email</button>
                </div>

                <div class="form-group boxed">
                    <div class="text-start input-wrapper">
                        <label class="fw-bold" for="whatsapp">Nomor WhatsApp</label>
                        <input type="text" class="form-control" id="whatsapp" x-model="data.profile.phone" disabled>
                    </div>
                </div>

                <div class="form-group mb-2">
                    <button type="button" data-bs-toggle="modal" data-bs-target="#ModalFormWA" class="btn btn-outline-secondary btn-sm" @click="generateToken('phone')">Ganti Nomor WhatsApp</button>
                </div>

            </div>
        </div>
    </div>
    <!-- * App Capsule -->

    <?= $this->include('profile/edit_account/_change_email') ?>
    <?= $this->include('profile/edit_account/_change_phone') ?>
    <?= $this->include('_bottommenu')?>
</div>

<?= $this->include('profile/edit_account/script') ?>