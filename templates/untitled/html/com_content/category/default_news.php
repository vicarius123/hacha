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
	
	$date_1 = new DateTime($items[0]->publish_up);
	$date_2 = new DateTime($items[1]->publish_up);
	$date_3 = new DateTime($items[2]->publish_up);
	$date_4 = new DateTime($items[3]->publish_up);
	$date_5 = new DateTime($items[4]->publish_up);
	$lang = JFactory::getLanguage()->getTag(); 
	
	$model = $this->getModel();
	
	if($lang == 'ru-RU'){
		$title_1 = $items[0]->title;
		$title_2 = $items[1]->title;
		$title_3 = $items[2]->title;
		$title_4 = $items[3]->title;
		$title_5 = $items[4]->title;
	}else{
		$title_1 = ($items[0]->title_en)? $items[0]->title_en : $items[0]->title;
		$title_2 = ($items[1]->title_en)? $items[1]->title_en : $items[1]->title;
		$title_3 = ($items[2]->title_en)? $items[2]->title_en : $items[2]->title;
		$title_4 = ($items[3]->title_en)? $items[3]->title_en : $items[3]->title;
		$title_4 = ($items[4]->title_en)? $items[4]->title_en : $items[4]->title;
	}
	$app = JFactory::getApplication();
	$menu = $app->getMenu()->getActive()->id;
	
	$all_tags = $model->getAllTags();
	
	$tags = JRequest::getVar('tag');
?>

<?if($menu == 170 || $menu == 156):?>
	<ul class="all_tags">	
		<li class="<?=(empty($tags))?'active':'';?>">
			<a href="/news"><?=($lang == 'ru-RU')?'Все новости':'All news'?></a>
		</li>
		<? foreach($all_tags as $key=>$tag):?>
			<?if($tag->id != 1):?>
				<li class="<?=(($tags == $tag->id))?'active':'';?>">
					<a href="/news?tag=<?=$tag->id?>">#<?=($lang == 'ru-RU')? $tag->title:(empty($tag->title_en))?$tag->title:$tag->title_en;?></a>
					
				</li>
			<? endif;?>
		<? endforeach;?>
	</ul>
<? endif; ?>

<div class="all_news">

	<div class="row">
		<div class="col-sm-6">
			<div class="big_new" onclick="location.href='<?=JRoute::_(ContentHelperRoute::getArticleRoute($items[0]->id,$items[0]->catid, $items[0]->language), false);?>'">
				<div class="img">
					<img src="http://hacha.ru/media/<?=json_decode($items[0]->images)->image_intro;?>" alt="<?=$items[0]->title;?>"/>
					<div class="date"><?=$date_1->format('d');?><div class="months"><?=($lang == 'ru-RU')?$months[($date_1->format('n'))]:$date_1->format('F');?></div></div>
				</div>
				<div class="hashTag"><?=$model->getTags($items[0]->id,$lang);?></div>
				<div class="title"><?=$title_1;?></div>
			</div>
		</div>
		<div class="col-sm-6">
			<div class="row">
				
				<div class="col-sm-6">
					<?if($items[1]->id):?>
					<div class="middle_news" onclick="location.href='<?=JRoute::_(ContentHelperRoute::getArticleRoute($items[1]->id,$items[1]->catid, $items[1]->language), false);?>'">
						<div class="img"  style="background:url('http://hacha.ru/media/<?=json_decode($items[1]->images)->image_intro;?>')no-repeat center center">
							<div class="date"><?=$date_2->format('d');?><div class="months"><?=($lang == 'ru-RU')?$months[($date_2->format('n'))]:$date_2->format('F');?></div></div>
						</div>
						<div class="hashTag"><?=$model->getTags($items[1]->id,$lang);?></div>
						<div class="title"><?=$title_2;?></div>
					</div>
					<? endif;?>
					<? if($items[2]->id):?>
					<div class="middle_news" onclick="location.href='<?=JRoute::_(ContentHelperRoute::getArticleRoute($items[2]->id, $items[2]->catid, $items[2]->language), false);?>'">
						<div class="img"  style="background:url('http://hacha.ru/media/<?=json_decode($items[2]->images)->image_intro;?>')no-repeat center center">
							<div class="date"><?=$date_3->format('d');?><div class="months"><?=($lang == 'ru-RU')?$months[($date_3->format('n'))]:$date_3->format('F');?></div></div>
						</div>
						<div class="hashTag"><?=$model->getTags($items[2]->id,$lang);?></div>
						<div class="title"><?=$title_3;?></div>
					</div>
					<? endif;?>
				</div>
				<div class="col-sm-6 hide_r">
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
<? if(!empty($items)):?>
<div class="more_news row">
	<? $nn = 0;?>
	<?foreach ($items as $key=>$item):
		($lang == 'ru-RU')?  $title = $item->title : $title = ($item->title_en =='')? $item->title : $item->title_en;
		
		
	?>
	
	<? $date = new DateTime($item->publish_up);?>

		<div class="col-sm-3">
			<div class="middle_news normal_news" onclick="location.href='<?=JRoute::_(ContentHelperRoute::getArticleRoute($item->id,$item->catid, $item->language), false);?>'">
				<div class="img" style="background:url('http://hacha.ru/media/<?=json_decode($item->images)->image_intro;?>')no-repeat center center">
					
					<div class="date"><?=$date->format('d');?><div class="months"><?=($lang == 'ru-RU')?$months[($date->format('n'))]:$date->format('F');?></div></div>
				</div>
				
				<div class="hashTag"><?=$model->getTags($item->id,$lang);?></div>
				<div class="title"><?=$title?></div>
			</div>
		</div>
	<? $nn++;?>

	
	<? endforeach;?>
</div>
<?endif;?>
<?endif;?>
<br><br>
<div class="b-moreContent news">
	<div class="button"></div>
	<div class="text">
		<?=($lang == 'ru-RU')?'Показать ещё новости и события':'Show more';?>
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