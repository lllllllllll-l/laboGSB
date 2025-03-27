<footer>
    <div class="footer-container">
        <div class="footer-left">
            <p>&copy; <?php echo date("Y"); ?> Projet Médicaments PHP. Tous droits réservés.</p>
        </div>
        <div class="footer-right">
            <?php
                echo '<form action="index.php" method="post" class="mt-2">';
                echo '<button type="submit" name="action" value="chargementMentionLegales" class="btnFooter">Mention Légales</button>';
                echo '</form>';
            ?>
        </div>
    </div>
</footer>