<h2>Liste des membres</h2>

<table class="tableauDonnees">
    <thead>
        <tr class="enteteTableauDonnees">
            <th><?php echo link_to('Nom', 		'membre/index?orderby=NOM') ?></th>
            <th><?php echo link_to('Prénom', 	'membre/index?orderby=PRENOM') ?></th>
            <th><?php echo link_to('Pseudo', 	'membre/index?orderby=PSEUDO') ?></th>
            <th><?php echo link_to('Statut', 	'membre/index?orderby=STATUT_ID') ?></th>
            <th><?php echo link_to('Ville', 	'membre/index?orderby=VILLE') ?></th>
            <th width="75px">Actions</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($membresPager->getResults() as $membre): ?>

        <?php if ($membre->isAjourCotisation()): ?>
            <tr>
        <?php else: ?>
            <tr class="cotisationNonAjour">
        <?php endif; ?>

            <td><?php echo $membre->getNom() ?></td>
            <td><?php echo $membre->getPrenom() ?></td>
            <td><?php echo $membre->getPseudo() ?></td>
            <td><?php echo $membre->getStatut() ?></td>
            <td><?php echo $membre->getVille() ?></td>
            <td>
                <?php if ($membre->getEmail()) :?>
                    <a href="mailto:<?php echo $membre->getEmail() ?>"><?php echo image_tag('mail.png', array('alt' => '[e-mail]')) ?></a>
                <?php else: ?>
                    <?php echo image_tag('no_mail') ?>
                <?php endif; ?>
                <?php echo link_to(image_tag('edit.png', array('alt' => '[éditer]')), 'membre/edit?id=' . $membre->getId()) ?>
                <?php echo link_to(image_tag('details.png', array('alt' => '[details]')), 'membre/show?id=' . $membre->getId()) ?>
                <?php echo link_to(image_tag('delete.png', array('alt' => '[supprimer]')), 'membre/delete?id=' . $membre->getId(), array('method' => 'delete', 'confirm' => 'Etes vous sur ?')) ?>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>


<!-- Legend -->
<table>
    <tr>
        <td colspan="2">&nbsp;</td>
    </tr>
    <tr>
        <td class="cotisationNonAjour" width="20px">&nbsp;</td>
        <td>Cotisation non à jour</td>
    </tr>
</table>


<?php include_partial('global/pager', array('pager' => $membresPager, 'module' => 'membre', 'action' => 'index', 'params' => array('orderby' => 'NOM'))) ?>

<div class="addNew">
	<?php echo link_to(image_tag('add', 'align="top"'). ' Enregistrer un membre', 'membre/new') ?>
</div>
