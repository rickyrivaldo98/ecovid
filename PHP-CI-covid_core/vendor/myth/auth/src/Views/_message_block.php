<?php if (session()->has('message')) : ?>
<div role="alert">
	<div class="bg-green-500 text-white font-bold rounded-t px-4 py-2">
		Success
	</div>
	<div class="border border-t-0 border-green-400 rounded-b bg-green-100 px-4 py-3 text-green-700">
		<p>
			<?= session('message') ?>
		</p>
	</div>
</div>
<?php endif ?>

<?php if (session()->has('error')) : ?>
<div role="alert">
	<div class="bg-red-500 text-white font-bold rounded-t px-4 py-2">
		Danger
	</div>
	<div class="border border-t-0 border-red-400 rounded-b bg-red-100 px-4 py-3 text-red-700">
		<p>
			<?= session('error') ?>
		</p>
	</div>
</div>
<?php endif ?>

<?php if (session()->has('errors')) : ?>
<div role="alert">
	<div class="bg-red-500 text-white font-bold rounded-t px-4 py-2">
		Danger
	</div>
	<div class="border border-t-0 border-red-400 rounded-b bg-red-100 px-4 py-3 text-red-700">
		<ul>
			<?php foreach (session('errors') as $error) : ?>
			<li>
				<?= $error ?>
			</li>
			<?php endforeach ?>
		</ul>
	</div>
</div>
<?php endif ?>