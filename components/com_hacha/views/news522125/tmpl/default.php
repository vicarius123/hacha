<?php
	/**
		* @version    CVS: 1.0.0
		* @package    Com_Hacha
		* @author     Cristopher Chong <cris_chong2@hotmail.com>
		* @copyright  2016 nOne.ru
		* @license    GNU General Public License version 2 or later; see LICENSE.txt
	*/
	// No direct access
	defined('_JEXEC') or die;
	
	JHtml::addIncludePath(JPATH_COMPONENT . '/helpers/html');
	JHtml::_('bootstrap.tooltip');
	JHtml::_('behavior.multiselect');
	JHtml::_('formbehavior.chosen', 'select');
	
	$user       = JFactory::getUser();
	$userId     = $user->get('id');
	$months = array(
    1 => 'Января', 2 => 'Февраля', 3 => 'Марта', 4 => 'Апреля',
    5 => 'Мая', 6 => 'Июня', 7 => 'Июля', 8 => 'Августа',
    9 => 'Сентября', 10 => 'Октября', 11 => 'Ноября', 12 => 'Декабря'
	);
	
	$items = $this->items;
	
	$date_1 = new DateTime($items[0]->date);
	$date_2 = new DateTime($items[1]->date);
	$date_3 = new DateTime($items[2]->date);
	
	$model = $this->getModel();
?>


<div class="all_news">
	<div class="row">
		<div class="col-sm-6">
			<div class="big_new" >
				<div class="img">
					<img src="http://hacha.ru/media/<?=$items[0]->image;?>" alt="<?=$items[0]->title;?>"/>
					<div class="date"><?=$date_1->format('d');?><div class="months"><?=$months[($date_1->format('n'))];?></div></div>
				</div>
				<div class="hashTag"><?=$model->getTags($items[0]->id);?></div>
				<div class="title"><?=$items[0]->title;?></div>
			</div>
		</div>
		<div class="col-sm-6">
			<div class="row">
				<div class="col-sm-6">
					<div class="middle_news">
						<div class="img"  style="background:url('http://hacha.ru/media/<?=$items[1]->image;?>')no-repeat center center">
							<div class="date"><?=$date_2->format('d');?><div class="months"><?=$months[($date_2->format('n'))];?></div></div>
						</div>
						<div class="hashTag"><?=$model->getTags($items[1]->id);?></div>
						<div class="title"><?=$items[1]->title;?></div>
					</div>
					
					<div class="middle_news">
						<div class="img"  style="background:url('http://hacha.ru/media/<?=$items[2]->image;?>')no-repeat center center">
							<div class="date"><?=$date_3->format('d');?><div class="months"><?=$months[($date_3->format('n'))];?></div></div>
						</div>
						<div class="hashTag"><?=$model->getTags($items[2]->id);?></div>
						<div class="title"><?=$items[2]->title;?></div>
					</div>
				</div>
				<div class="col-sm-6">
					<div class="middle_news ">
						<div class="fb-like-box" data-href="https://www.facebook.com/hachapuri" data-width="223" data-colorscheme="light" data-show-faces="true" data-header="false" data-stream="false" data-show-border="false"></div>
						<div class="hashTag_f"><span class="news-filter-tag hashtag" data-tag-pk="12">#фэйсбук</span><span class="news-filter-tag hashtag" data-tag-pk="3">#толик</span></div>
						<div class="title">Присоединяйтесь<br>к нам или к <span class="name">Толику</span></div>
						
						<div class="sheep">
							<img src="http://hacha.ru/static/img/sheep_img.7b1d4663d317.png"/>
						</div>
						<div style="width: 170px; margin: 0 auto;">
							<div id="TA_certificateOfExcellence385" class="TA_certificateOfExcellence">
								<ul id="SHaRAOb" class="TA_links SHJUBRz">
									<li id="9w9vtFw" class="Sil2E9">
										<a target="_blank" href="http://www.tripadvisor.ru/Restaurant_Review-g298484-d2369835-Reviews-Hachapuri-Moscow_Central_Russia.html"><img src="http://www.tripadvisor.ru/img/cdsi/img2/awards/CoE2015_WidgetAsset-14348-2.png" alt="TripAdvisor" class="widCOEImg" id="CDSWIDCOELOGO"/></a>
									</li>
								</ul>
							</div>
						</div>
						<script src="http://www.jscache.com/wejs?wtype=certificateOfExcellence&amp;uniq=385&amp;locationId=2369835&amp;lang=ru&amp;year=2015&amp;display_version=2"></script>
					</div>
					
				</div>
			</div>
		</div>
	</div>

	
</div>

<? if(!empty($_POST['limit'])):?>
<div class="more_news">
	<? $nn = 0;?>
	<?foreach ($items as $key=>$item):?>
	
	<? $date = new DateTime($item->date);?>
	<? if($nn % 4 == 0):?>
		<div class="row">	
	<? endif;?>
		<div class="col-sm-3">
			<div class="middle_news normal_news" data-news_id="<?=$item->id;?>" >
				<div class="img" style="background:url('http://hacha.ru/media/<?=$item->image;?>')no-repeat center center">
					
					<div class="date"><?=$date->format('d');?><div class="months"><?=$months[($date->format('n'))];?></div></div>
				</div>
				<div class="hashTag"><?=$model->getTags($item->id);?></div>
				<div class="title"><?=$item->title;?></div>
			</div>
		</div>
	<? $nn++;?>
	<? if($nn % 4 == 0):?>
		</div>
	<? endif;?>
	
	<? endforeach;?>
</div>

<?endif;?>

<br><br>
<div class="b-moreContent news">
	<div class="button"></div>
	<div class="text">
		Показать ещё новости и события
    </div>
</div>
<script>
	
	(function(d, s, id) {
		var js, fjs = d.getElementsByTagName(s)[0];
		if (d.getElementById(id)) return;
		js = d.createElement(s);
		js.id = id;
		js.src = "//connect.facebook.net/ru_RU/all.js#xfbml=1&appId=488642177919080";
		fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));
</script>

