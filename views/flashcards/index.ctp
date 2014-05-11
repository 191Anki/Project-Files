<h1> Flashcard Database </h1>

<?php foreach ($flashcards as $flashcard): ?>
<p>
<?php echo $flashcard['Flaschard']['title']; ?> | <?php echo $flashcard['Flashcard']['created']; ?>

<?php endforeach; ?>
<?php unset($post); ?>
