<div class="actions columns large-2 medium-3">
	<h3><?= __('Actions') ?></h3>
	<ul class="side-nav">
		<li><?= $this->Html->link(__('Edit Tag'), ['action' => 'edit', $tag->id]) ?> </li>
		<li><?= $this->Form->postLink(__('Delete Tag'), ['action' => 'delete', $tag->id], ['confirm' => __('Are you sure you want to delete # %s?', $tag->id)]) ?> </li>
		<li><?= $this->Html->link(__('List Tags'), ['action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Tag'), ['action' => 'add']) ?> </li>
		<li><?= $this->Html->link(__('List BookmarksTags'), ['controller' => 'BookmarksTags', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Bookmarks Tag'), ['controller' => 'BookmarksTags', 'action' => 'add']) ?> </li>
		<li><?= $this->Html->link(__('List Bookmarks'), ['controller' => 'Bookmarks', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Bookmark'), ['controller' => 'Bookmarks', 'action' => 'add']) ?> </li>
	</ul>
</div>
<div class="tags view large-10 medium-9 columns">
	<h2><?= h($tag->title) ?></h2>
	<div class="row">
		<div class="large-5 columns strings">
			<h6 class="subheader"><?= __('Title') ?></h6>
			<p><?= h($tag->title) ?></p>
		</div>
		<div class="large-2 large-offset-1 columns numbers end">
			<h6 class="subheader"><?= __('Id') ?></h6>
			<p><?= $this->Number->format($tag->id) ?></p>
		</div>
		<div class="large-2 columns dates end">
			<h6 class="subheader"><?= __('Created') ?></h6>
			<p><?= h($tag->created) ?></p>
			<h6 class="subheader"><?= __('Modified') ?></h6>
			<p><?= h($tag->modified) ?></p>
		</div>
	</div>
</div>
<div class="related row">
	<div class="column large-12">
	<h4 class="subheader"><?= __('Related BookmarksTags') ?></h4>
	<?php if (!empty($tag->bookmarks_tags)): ?>
	<table cellpadding="0" cellspacing="0">
		<tr>
			<th><?= __('Bookmark Id') ?></th>
			<th><?= __('Tag Id') ?></th>
			<th class="actions"><?= __('Actions') ?></th>
		</tr>
		<?php foreach ($tag->bookmarks_tags as $bookmarksTags): ?>
		<tr>
			<td><?= h($bookmarksTags->bookmark_id) ?></td>
			<td><?= h($bookmarksTags->tag_id) ?></td>
			<td class="actions">
				<?= $this->Html->link(__('View'), ['controller' => 'BookmarksTags', 'action' => 'view', $bookmarksTags->bookmark_id]) ?>
				<?= $this->Html->link(__('Edit'), ['controller' => 'BookmarksTags', 'action' => 'edit', $bookmarksTags->bookmark_id]) ?>
				<?= $this->Form->postLink(__('Delete'), ['controller' => 'BookmarksTags', 'action' => 'delete', $bookmarksTags->bookmark_id], ['confirm' => __('Are you sure you want to delete # %s?', $bookmarksTags->bookmark_id)]) ?>
			</td>
		</tr>
		<?php endforeach; ?>
	</table>
	<?php endif; ?>
	</div>
</div>
<div class="related row">
	<div class="column large-12">
	<h4 class="subheader"><?= __('Related Bookmarks') ?></h4>
	<?php if (!empty($tag->bookmarks)): ?>
	<table cellpadding="0" cellspacing="0">
		<tr>
			<th><?= __('Id') ?></th>
			<th><?= __('User Id') ?></th>
			<th><?= __('Title') ?></th>
			<th><?= __('Description') ?></th>
			<th><?= __('Url') ?></th>
			<th><?= __('Created') ?></th>
			<th><?= __('Modified') ?></th>
			<th class="actions"><?= __('Actions') ?></th>
		</tr>
		<?php foreach ($tag->bookmarks as $bookmarks): ?>
		<tr>
			<td><?= h($bookmarks->id) ?></td>
			<td><?= h($bookmarks->user_id) ?></td>
			<td><?= h($bookmarks->title) ?></td>
			<td><?= h($bookmarks->description) ?></td>
			<td><?= h($bookmarks->url) ?></td>
			<td><?= h($bookmarks->created) ?></td>
			<td><?= h($bookmarks->modified) ?></td>
			<td class="actions">
				<?= $this->Html->link(__('View'), ['controller' => 'Bookmarks', 'action' => 'view', $bookmarks->id]) ?>
				<?= $this->Html->link(__('Edit'), ['controller' => 'Bookmarks', 'action' => 'edit', $bookmarks->id]) ?>
				<?= $this->Form->postLink(__('Delete'), ['controller' => 'Bookmarks', 'action' => 'delete', $bookmarks->id], ['confirm' => __('Are you sure you want to delete # %s?', $bookmarks->id)]) ?>
			</td>
		</tr>
		<?php endforeach; ?>
	</table>
	<?php endif; ?>
	</div>
</div>
