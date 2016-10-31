<div class="chatarea">
    <?php if($nome): ?>
        <p>Olá <?= $nome ?></p>
    <?php endif; ?>
    
</div>

<div class="inputarea" data-nome="<?= $nome ?>">
    <input type="text" class="msg" onkeyup="keyUpChat(this, event)">
</div>

