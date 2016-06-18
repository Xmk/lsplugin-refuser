<section class="block block-type-ref">
	<header class="block-header">
		<h3>{$aLang.plugin.refuser.block_title}</h3>
	</header>

	<div class="block-content">
		<ul class="item-list">
			{foreach $aUserRefs as $oRef}
				{$oUser = $oRef->getUser()}
				<li>
					<a href="{$oUser->getUserWebPath()}"><img src="{$oUser->getProfileAvatarPath(48)}" alt="avatar" class="avatar" /></a>
					<a href="{$oUser->getUserWebPath()}">{$oUser->getLogin()|escape:'html'}</a>
					<p><strong>{date_format date=$oRef->getDate()}</strong></p>
				</li>
			{/foreach}
		</ul>
		{if $oUserCurrent && $oUserCurrent->getId() == $oUserProfile->getId()}
			<footer>
				{$aLang.plugin.refuser.profile_link}: <strong>{router page='ref'}{$oUserProfile->getLogin()}</strong>
			</footer>
		{/if}
	</div>
</section>