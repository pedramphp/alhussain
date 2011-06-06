<?php 

	class Homepage extends SiteObject {
		
		public function __construct(){
			parent::__construct();
		}
		
		
		public function process(){
			$images = array();
			$imageThumbUrl = "style/default/red/images/gallery/private/thumb/";
			$imageOriginalUrl = "style/default/red/images/gallery/private/original/";
			$sources = 
			array("IMG_2747.jpg",
						"IMG_2748.jpg",
						"IMG_2752.jpg",
						"IMG_2755.jpg",
						"IMG_2762.jpg",
						"IMG_2766.jpg",
						"IMG_2767.jpg",
						"IMG_2771.jpg",
						"IMG_2773.jpg",
						"IMG_1202.jpg",
						"IMG_1209.jpg",
						"IMG_1215.jpg",
						"IMG_1228.jpg",
						"IMG_1230.jpg",
						"IMG_1245.jpg",
						"IMG_1253.jpg",
						"IMG_1254.jpg",
						"IMG_1258.jpg",
						"IMG_1261.jpg",
						"A.H.-TV-021.jpg",
						"A.H.-TV-030.jpg",
						"A.H.-TV-033.jpg",
						"A.H.-TV-107.jpg",
						"A.H.-TV-108.jpg",
						"A.H.-TV-137.jpg",
						"A.H.-TV-151.jpg",
						"A.H.-TV-159.jpg",
						"A.H.-TV-160.jpg",
						"DSCN0055.jpg",
						"DSCN0058.jpg",
						"DSCN0059.jpg",
						"DSCN0073.jpg",
						"DSCN0083.jpg",
						"DSCN0085.jpg",
						"IMG_2723.jpg",
						"IMG_2724.jpg",
						"IMG_2729.jpg",
						"IMG_2730.jpg",
						"IMG_2740.jpg"
			);
			
						
			$videoThumb = "style/default/red/images/videoGallery/";
			$videos = 
			array( array('thumb' => $videoThumb."video4.jpg",'original' => 'http://player.vimeo.com/video/24204187?title=0&amp;byline=0&amp;portrait=0&amp;autoplay=1'),
						 array('thumb' => $videoThumb."video6.jpg",'original' => 'http://player.vimeo.com/video/24203816?title=0&amp;byline=0&amp;portrait=0&amp;autoplay=1'),
						 array('thumb' => $videoThumb."video3.jpg",'original' => 'http://player.vimeo.com/video/24204283?title=0&amp;byline=0&amp;portrait=0&amp;autoplay=1'),
						 array('thumb' => $videoThumb."video1.jpg",'original' => 'http://player.vimeo.com/video/24143863?title=0&amp;byline=0&amp;portrait=0&amp;autoplay=1'),
						 array('thumb' => $videoThumb."video5.jpg",'original' => 'http://player.vimeo.com/video/24204130?title=0&amp;byline=0&amp;portrait=0&amp;autoplay=1'),
						 array('thumb' => $videoThumb."video2.jpg",'original' => 'http://player.vimeo.com/video/24204753?title=0&amp;byline=0&amp;portrait=0&amp;autoplay=1')
						 
			);
			
			foreach( $sources as $key => $value){
				$images[$key]['thumb'] =		$imageThumbUrl.$value;
				$images[$key]['original'] =	$imageOriginalUrl.$value;
			}
			
			
			
			$this->results = array('imageThumbs' => $images,
														 'videoThumbs' => $videos,
														 'hadith' => $this->getRandomHadith());
			
		}
		
		
		
		private function getRandomHadith(){
			
			$hadith = array();
			$hadith[] = "Prophet Mohammad (P.B.U.H) said in Nahj Al- Fasahah (Height of Rhetoric)";
			$hadith[] = "A (true) believer does not taunt, damn, slander and abuse people.";
			$hadith[] = "A (true) believer is bereft of two attributes: telling lie and stinginess.";
			$hadith[] = "Everything has a foundation, and the foundation of Islam is love for us, the Ahl al-Bayt.";
			$hadith[] = "A believer is in a good state all the time; even when he is on the verge of death, he praises God.";
			$hadith[] = "A believer is so lenient and gentle that one might call him stupid.";
			$hadith[] = "A believer is the one whom people consider honest as to their lives, wealth and blood.";
			$hadith[] = "A believer must not feel satiated, with his neighbor being hungry.";
			$hadith[] = "A believer who associates with people and patiently tolerates their harms is better than the believer who does not do so.";
			$hadith[] = "A believer will not kill anybody in ambush warfare.";
			$hadith[] = "A believer will reside under the shade of his alms in the Day of Judgment.";
			$hadith[] = "A believer’s dignity lies in standing up to prayer at nights, and his greatness lies in needlessness from people.";
			$hadith[] = "A believer’s promise is a binding commitment.";
			$hadith[] = "A believer's dream is one among the forty units comprising Prophet hood. It is tied to the leg of a bird as long as not revealed, but it will fall down if the reverse occurs. Thus, reveal not your dreams to anybody save the wise or intimate friends.";
			$hadith[] = "A creditor will be in chains in his grave, and nothing can make him free but paying his debts.";
			$hadith[] = "A curb of fire will be put on the mouth of whoever conceals his knowledge when asked to offer it.";
			$hadith[] = "A Derham earned in usury is worse for a man in the sight of God than committing adultery thirty six times.";
			$hadith[] = "A fasting person will be worshipping God from early morning till night, if he does not backbite people, but his fast will be ruined as soon as he begins to do so.";
			$hadith[] = "A hypocrite is known by three characteristics: he tells lie, breaks his (her) promise and commits treachery in trusts.";
			$hadith[] = "Call unto your Lord and believe that He will hear you, and know that God will not grant the prayers of those with negligent hearts.";
			$hadith[] = "Charity blocks seventy doors to evil.";
			$hadith[] = "Causing the world to decline is more tolerable to God than killing a Muslim.";
			$hadith[] = "Chastity is women's beauty.";
			$hadith[] = "Cheerfulness carries away one's hatred.";
			$hadith[] = "Choose your neighbor before buying a house, and find a friend before taking a trip.";
			$hadith[] = "Clean yourself of urine, for it's the cause of most punishments in the grave.";
			$hadith[] = "Consultation is a wall for regret and safety against reproach.";
			$hadith[] = "Control your tongue as well as your private parts.";
			$hadith[] = "Contorting one's tongue keeps man from wrong.";
			$hadith[] = "Cunning and stingy people will not be allowed to Paradise.";
			$hadith[] = "Bad- temperedness is ill- omened, and the worst of you is the most ill- tempered one.";
			$hadith[] = "Be an early bird in seeking knowledge, for early- rising brings you blessing and prosperity.";
			$hadith[] = "Be clean to the extent possible, for the Exalted God has founded Islam on cleanliness, and nobody enters Paradise save the clean.";
			$hadith[] = "Be careful about a believer's wit, for he looks (at things) through the light of God, the Most High!";
			$hadith[] = "Be generous (to people) and put them not in straits, for you will be put in straits (in the Hereafter).";
			$hadith[] = "Be good and refrain from evil. Behave in such a way that in your absence, people talk of you as you wished, and abstain from what you do not like people to attribute to you.";
			$hadith[] = "Be good- tempered, for the most good- tempered are the best in religion.";
			$hadith[] = "Be honest to those who consider you trustworthy, and be not a traitor to those who have been disloyal to you.";
			$hadith[] = "Be kind to your parents and thus, your children will be kind to you, and practice chastity so that your wives keep chaste.";
			$hadith[] = "Be patient in doing what you want to, and God will show you how to do it.";
			$hadith[] = "Be truthful, for truthfulness is surely a path to Paradise, and avoid lying for it's verily a way to Hell.";
			$hadith[] = "Beautify your dresses and improve your tools to shine as a star among people.";
			$hadith[] = "Beauty is to speak well based on truth, and perfection is to act well based on honesty.";
			$hadith[] = "Begin your day with charity, for it surely stops calamity.";
			$hadith[] = "Whoever does not accept his Muslim brother’s apology will not be allowed to meet me at the Pond (in Paradise).";
			$hadith[] = "Believers are mirrors for and brothers of one another, covertly guarding each other.";
			$hadith[] = "Beware of jealousy, for it devours good deeds as fire puts out firewood.";
			$hadith[] = "Blessed is the one who controls his tongue and sobs for his sins.";   
			$hadith[] = "Being like one's father is indicative of man's fortune.";
			$hadith[] = "Believing in predestination makes grief and sorrows fade away.";
			$hadith[] = "Blessed are the sincere ones who are lights of guidance, enlightening all dark seditions through their brightness.";
			$hadith[] = "Blessed is the one who is guided to Islam, who has sufficient sustenance, and who is contented with it.";
			$hadith[] = "Blessing escapes a meeting wherein participants do not listen to each other.";
			$hadith[] = "Brushing one's teeth gives rise to a healthy mouth, pleasure of God and strength of eyes.";
			$hadith[] = "A group of the people of Paradise will get worried about some of the people of Hell, and will (therefore) inquire: \"Why are you in Hell? By God, we did not enter Paradise save through what we learned from you\". The Hell- bound reply: \"We did not practice what we preached.\"";
			return $hadith[array_rand($hadith)];
		}
		
	}


?>