<textarea 
 id="<?= str_replace(['[', ']'], ['__', ''], $config['field']); ?>" 
 class="form-control" 
 rows="<?= $config['rows'] ?? 5 ?>" 
 name="<?php echo $config['field']; ?>" 
 placeholder="<?= $config['placeholder'] ?? ''; ?>" <?= $config['attr'] ?? ''; ?> 
 data-caption="<?= $config['label']; ?>" <?= strpos($config['rules'] ?? '', 'required') !== false ? 'required' : ''; ?>>
 <?php echo $value; ?>
</textarea>