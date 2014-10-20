<div class="actions columns large-2 medium-3">
	<h3><?= __('Actions') ?></h3>
	<ul class="side-nav">
		<li><?= $this->Html->link(__('New Bookmark'), ['action' => 'add']) ?></li>
		<li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
		<li><?= $this->Html->link(__('List BookmarksTags'), ['controller' => 'BookmarksTags', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Bookmarks Tag'), ['controller' => 'BookmarksTags', 'action' => 'add']) ?> </li>
		<li><?= $this->Html->link(__('List Tags'), ['controller' => 'Tags', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Tag'), ['controller' => 'Tags', 'action' => 'add']) ?> </li>
	</ul>
</div>
<div class="bookmarks index large-10 medium-9 columns">
	<table cellpadding="0" cellspacing="0">
	<thead>
		<tr>
			<th><?= $this->Paginator->sort('title') ?></th>
			<th><?= $this->Paginator->sort('url') ?></th>
			<th class="actions"><?= __('Actions') ?></th>
		</tr>
	</thead>
	<tbody>
	<?php foreach ($bookmarks as $bookmark): ?>
		<tr>
			<td><?= h($bookmark->title) ?></td>
			<td><?= h($bookmark->url) ?></td>
			<td class="actions">
				<?= $this->Html->link(__('View'), ['action' => 'view', $bookmark->id]) ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</tbody>
	</table>
	<div class="paginator">
		<ul class="pagination">
		<?php
			echo $this->Paginator->prev('< ' . __('previous'));
			echo $this->Paginator->numbers();
			echo $this->Paginator->next(__('next') . ' >');
		?>
		</ul>
		<p><?= $this->Paginator->counter() ?></p>
	</div>
</div>
