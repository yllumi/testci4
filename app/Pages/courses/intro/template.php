<div
	class="header-mobile-only"
	id="course_intro"
	x-data="courseIntro($params.course_id)"
	x-effect="loadPage(`/courses/intro/data/${$params.course_id}`)">

	<?= $this->include('_appHeader'); ?>

	<style>
		.cover {
			object-fit: cover;
			width: 100%;
			height: 100%;
		}

		.progress,
		.progress-bar {
			height: 22px;
		}

		.card-hover:hover {
			transform: translateY(-2px);
			transition: all 0.3s ease;
		}

		.bg-light-secondary {
			background-color: rgba(108, 117, 125, 0.1);
		}

		.rounded-20 {
			border-radius: 20px;
		}
		.bg-warning-2 {
			background-color: #fe9500;
		}
	</style>

	<div id="appCapsule">
		<!-- Fullscreen Alert Overlay -->
		<!-- <div x-show="!data.is_enrolled" class="position-fixed top-0 start-0 w-100 h-100 d-flex align-items-center justify-content-center" style="background: rgba(0,0,0,0.9); z-index: 9999;">
			<div class="text-center p-4">
				<div class="alert alert-warning mb-4" role="alert">
					<i class="bi bi-exclamation-triangle fs-1 d-block"></i>
					<h4 class="text-warning mb-2">Akses Terbatas</h4>
					<p class="mb-4">Anda belum terdaftar di kelas ini. Silakan daftar terlebih dahulu untuk mengakses materi.</p>
					<a target="_blank" href="https://ruangai.id/registration" class="btn btn-warning">Daftar Sekarang</a>
				</div>
			</div>
		</div> -->

		<div class="appContent py-4" style="min-height:90vh">
			<!-- Header -->
			<div class="section p-4 px-3 bg-white rounded-4 mb-3 position-relative overflow-hidden">
				<div class="d-flex align-items-center gap-3 position-relative" style="z-index: 99;">
					<div class="avatar">
						<img src="https://cdn-icons-png.flaticon.com/512/219/219983.png" alt="avatar" class="imaged w64 rounded-circle">
					</div>
					<div>
						<h5 class="mb-0 fw-normal">Selamat Belajar,</h5>
						<h4 class="mb-0" x-text="data.name"></h4>
					</div>
				</div>
				<img src="https://ik.imagekit.io/56xwze9cy/ruangai/Redesign/Group%206633.png" class="position-absolute bottom-0 end-0 w-25" alt="">
			</div>

			<!-- Card Kelas -->
			<div class="section p-3 bg-white rounded-4 mb-3">
				<div class="card border-0 shadow-none overflow-hidden">
					<img src="https://ik.imagekit.io/56xwze9cy/ruangai/Redesign/Group%206751%20(2).png" class="card-img-top cover rounded-4" style="height: 200px;" alt="AI Course">
					<div class="card-body p-2">
						<h2 class=" mt-2">Kelas - Belajar Fundamental AI</h2>
						<p class="card-text p-0 mb-0">
							Pelajari dasar-dasar Artificial Intelligence (AI), bagaimana cara kerjanya, serta perannya dalam kehidupan sehari-hari.
							<button
								x-show="!meta.expandDesc" x-transition
								@click="meta.expandDesc = !meta.expandDesc" 
								class="border-0 bg-transparent text-primary text-decoration-none p-0">
								Lihat selengkapnya
							</button>
						</p>
						<div class="mt-3" x-show="meta.expandDesc" x-transition>
							<p>Kelas ini merupakan kelas pertama program RuangAI dari CODEPOLITAn yang fokus membahas tentang fundamental kecerdasan artifisial dengan total durasi belajar 15 jam, terdiri dari 30 materi dan 10 sesi live bersama mentor AI.</p>
							<p>Kelas ini merupakan bagian dari program AI Opportunity Fund: Asia Pasifik, bekerja sama dengan AVPN dan didukung oleh Google.org dan Asian Development Bank.</p>
							<button
								@click="meta.expandDesc = !meta.expandDesc" 
								class="border-0 bg-transparent text-primary text-decoration-none p-0">
								Lihat lebih sedikit
							</button>
						</div>
					</div>
				</div>
			</div>

			<!-- Progress Stats -->
			<div class="p-3 pb-4 bg-white rounded-4 mb-3">
				<h4 class="mb-4">Progres Belajar</h4>

				<!-- Modul Selesai -->
				<a href="/courses/intro/1/belajar-fundamental-ai/lessons">
					<div class="card border-0 rounded-4 mb-4"
						:class="data.total_lessons == data.lesson_completed ? 'bg-success bg-opacity-50' : 'bg-primary'">
						<div class="card-body d-flex align-items-center gap-3 p-4">

							<div class="rounded-3 d-flex align-items-center justify-content-center bg-white"
								style="width: 64px; height: 64px;">
								<i class="bi display-5"
								   :class="data.total_lessons == data.lesson_completed ? 'bi-check text-success' : 'bi-journal-bookmark-fill text-primary'"></i>
							</div>
							<div class="flex-grow-1">
								<div class="d-flex align-items-end gap-2">
									<h2 class="mb-0 fw-bold text-white" x-text="data.lesson_completed">0</h2>
									<span class="mb-1 text-white">Materi Selesai</span>
								</div>
								<div class="d-flex align-items-center">
									<div class="flex-grow-1">
										<div class="progress bg-dark bg-opacity-25" style="height: 7px;">
											<div class="progress-bar bg-white" 
												role="progressbar" 
												:style="{width: Math.round(data.lesson_completed/data.total_lessons*100) + '%'}" 
												:aria-valuenow="Math.round(data.lesson_completed/data.total_lessons*100)" aria-valuemin="0" aria-valuemax="100"></div>
										</div>
									</div>
									<span x-show="data?.total_lessons" class="ms-3 fw-bold text-white" style="font-size: 1rem;" x-text="Math.round(data.lesson_completed/data.total_lessons*100) + '%'">0%</span>
									<span x-show="!data?.total_lessons" class="ms-3 fw-bold text-white" style="font-size: 1rem;">0%</span>
								</div>
								<div class="text-white text-end small"><span x-text="data.total_lessons"></span> total materi dan kuis</div>
							</div>
						</div>
					</div>
				</a>

				<!-- Live Session Wajib -->
				<a href="/courses/intro/1/belajar-fundamental-ai/live_session">
					<div class="card border-0 rounded-4 bg-warning-2"
						:class="data.live_attendance >= 3 ? 'bg-success bg-opacity-50' : 'bg-warning-2'">
						<div class="card-body d-flex align-items-center gap-3 p-4">

							<div class="rounded-3 d-flex align-items-center justify-content-center bg-white"
								style="width: 64px; height: 64px;">
								<i class="bi display-5"
								   :class="data.live_attendance >= 3 ? 'bi-check text-success' : 'bi-camera-video text-warning'"></i>
							</div>
							<div class="flex-grow-1">
								<div class="d-flex align-items-end gap-2">
									<h2 class="mb-0 fw-bold text-white" x-text="data.live_attendance"></h2>
									<span class="mb-1 text-white">Sesi Live Diikuti</span>
								</div>
								<div class="d-flex align-items-center gap-2 mt-2 mb-1">
									<template x-for="i in data.live_meetings">
										<div 
											class="flex-fill rounded-pill" 
											:class="data.live_attendance >= i ? 'bg-white' : 'bg-dark bg-opacity-25'"
											style="height:7px;">&nbsp;</div>
									</template>
								</div>
								<div class="text-white text-end small">Minimal 3 dari <span x-text="data.live_meetings"></span> sesi</div>
							</div>
						</div>
					</div>
				</a>

			</div>


			<!-- Final Task -->
			<!-- <div class="section p-3 mb-3 bg-white rounded-4">
				<h4 class="fw-bold mb-3" style="color: #222;">Tugas Akhir</h4>
				<div class="card border-0 rounded-4" style="background: #7db9d2;">
					<div class="card-body d-flex align-items-center gap-3 p-4">
						<div class="rounded-3 d-flex align-items-center justify-content-center" style="width:64px;height:64px;background:#fff;">
							<i class="bi bi-clipboard" style="font-size:2.5rem; color:#7db9d2;"></i>
						</div>
						<div class="flex-grow-1">
							<div class="fw-bold mb-1" style="font-size:1.2rem; color:#fff;">Tugas Akhir - Berkenalan Dengan AI</div>
							<div style="font-size:1rem; color:#eaf6fa;">30 Soal pilihan ganda</div>
						</div>
					</div>
				</div>
			</div> -->

			<!-- Certificate -->
			<div class="section p-3 pb-4 bg-white rounded-4">
				<h4 class="fw-bold mb-3" style="color: #222;">Klaim Sertifikat</h4>

				<div
					class="card border-0 rounded-4 bg-dark bg-opacity-10"
					:class="meta.graduate ? 'bg-secondary' : 'bg-dark bg-opacity-10'">
					<div class="card-body d-flex align-items-center gap-3 p-4">
						<div class="rounded-3 d-flex align-items-center justify-content-center bg-white"
							style="min-width: 64px; height: 64px;">
							<i class="bi bi-award text-dark opacity-50 display-5"></i>
						</div>
						<div class="flex-grow-1">
							<h5 class="h6 opacity-50 mb-0">Selesaikan materi dan sesi live wajib untuk mendapatkan sertifikat.</h5>
							<!-- <div class="fw-bold" style="font-size:1.2rem; color:#fff;">Klaim Sertifikat Sekarang!</div> -->
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<?= $this->include('_bottommenu') ?>
	<?= $this->include('courses/intro/script') ?>
</div>