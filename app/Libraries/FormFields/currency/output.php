<div class="text-end text-nowrap">
    <span class="<?= ($config['streak_text'] ?? false) == true ? 'del' : ''; ?>">Rp <?php echo number_format($result[$config['field']] ?? 0, 0, ',', '.') . ',-'; ?></span>
</div>