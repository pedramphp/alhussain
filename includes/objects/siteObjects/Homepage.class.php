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
			$hadith[] = "A (true) believer does not taunt, damn, slander and abuse people. - Prophet Mohammad (P.B.U.H) ";
			$hadith[] = "A (true) believer is bereft of two attributes: telling lie and stinginess. - Prophet Mohammad (P.B.U.H) ";
			$hadith[] = "Everything has a foundation, and the foundation of Islam is love for us, the Ahl al-Bayt. - Prophet Mohammad (P.B.U.H) ";
			$hadith[] = "A believer is in a good state all the time; even when he is on the verge of death, he praises God. - Prophet Mohammad (P.B.U.H) ";
			$hadith[] = "A believer is so lenient and gentle that one might call him stupid. - Prophet Mohammad (P.B.U.H) ";
			$hadith[] = "A believer is the one whom people consider honest as to their lives, wealth and blood. - Prophet Mohammad (P.B.U.H) ";
			$hadith[] = "A believer must not feel satiated, with his neighbor being hungry. - Prophet Mohammad (P.B.U.H) ";
			$hadith[] = "A believer who associates with people and patiently tolerates their harms is better than the believer who does not do so. - Prophet Mohammad (P.B.U.H) ";
			$hadith[] = "A believer will not kill anybody in ambush warfare. - Prophet Mohammad (P.B.U.H) ";
			$hadith[] = "A believer will reside under the shade of his alms in the Day of Judgment. - Prophet Mohammad (P.B.U.H) ";
			$hadith[] = "A creditor will be in chains in his grave, and nothing can make him free but paying his debts. - Prophet Mohammad (P.B.U.H) ";
			$hadith[] = "A curb of fire will be put on the mouth of whoever conceals his knowledge when asked to offer it. - Prophet Mohammad (P.B.U.H) ";
			$hadith[] = "A Derham earned in usury is worse for a man in the sight of God than committing adultery thirty six times. - Prophet Mohammad (P.B.U.H) ";
			$hadith[] = "A fasting person will be worshipping God from early morning till night, if he does not backbite people, but his fast will be ruined as soon as he begins to do so. - Prophet Mohammad (P.B.U.H) ";
			$hadith[] = "A hypocrite is known by three characteristics: he tells lie, breaks his (her) promise and commits treachery in trusts. - Prophet Mohammad (P.B.U.H) ";
			$hadith[] = "Call unto your Lord and believe that He will hear you, and know that God will not grant the prayers of those with negligent hearts. - Prophet Mohammad (P.B.U.H) ";
			$hadith[] = "Charity blocks seventy doors to evil. - Prophet Mohammad (P.B.U.H) ";
			$hadith[] = "Causing the world to decline is more tolerable to God than killing a Muslim. - Prophet Mohammad (P.B.U.H) ";
			$hadith[] = "Choose your neighbor before buying a house, and find a friend before taking a trip. - Prophet Mohammad (P.B.U.H) ";
			$hadith[] = "Consultation is a wall for regret and safety against reproach. - Prophet Mohammad (P.B.U.H) ";
			$hadith[] = "Control your tongue as well as your private parts. - Prophet Mohammad (P.B.U.H) ";
			$hadith[] = "Cunning and stingy people will not be allowed to Paradise. - Prophet Mohammad (P.B.U.H) ";
			$hadith[] = "Bad- temperedness is ill-omened, and the worst of you is the most ill- tempered one. - Prophet Mohammad (P.B.U.H) ";
			$hadith[] = "Be an early bird in seeking knowledge, for early- rising brings you blessing and prosperity. - Prophet Mohammad (P.B.U.H) ";
			$hadith[] = "Be clean to the extent possible, for the Exalted God has founded Islam on cleanliness, and nobody enters Paradise save the clean. - Prophet Mohammad (P.B.U.H) ";
			$hadith[] = "Be generous (to people) and put them not in straits, for you will be put in straits (in the Hereafter). - Prophet Mohammad (P.B.U.H) ";
			$hadith[] = "Be good and refrain from evil. Behave in such a way that in your absence, people talk of you as you wished, and abstain from what you do not like people to attribute to you. - Prophet Mohammad (P.B.U.H) ";
			$hadith[] = "Be good- tempered, for the most good- tempered are the best in religion. - Prophet Mohammad (P.B.U.H) ";
			$hadith[] = "Be honest to those who consider you trustworthy, and be not a traitor to those who have been disloyal to you. - Prophet Mohammad (P.B.U.H) ";
			$hadith[] = "Be kind to your parents and thus, your children will be kind to you, and practice chastity so that your wives keep chaste. - Prophet Mohammad (P.B.U.H) ";
			$hadith[] = "Be patient in doing what you want to, and God will show you how to do it. - Prophet Mohammad (P.B.U.H) ";
			$hadith[] = "Beautify your dresses and improve your tools to shine as a star among people. - Prophet Mohammad (P.B.U.H) ";
			$hadith[] = "Beauty is to speak well based on truth, and perfection is to act well based on honesty. - Prophet Mohammad (P.B.U.H) ";
			$hadith[] = "Begin your day with charity, for it surely stops calamity. - Prophet Mohammad (P.B.U.H) ";
			$hadith[] = "Believers are mirrors for and brothers of one another, covertly guarding each other. - Prophet Mohammad (P.B.U.H) ";
			$hadith[] = "Beware of jealousy, for it devours good deeds as fire puts out firewood. - Prophet Mohammad (P.B.U.H) ";
			$hadith[] = "Blessed is the one who controls his tongue and sobs for his sins. - Prophet Mohammad (P.B.U.H) ";
			$hadith[] = "Believing in predestination makes grief and sorrows fade away. - Prophet Mohammad (P.B.U.H) ";
			$hadith[] = "Blessed are the sincere ones who are lights of guidance, enlightening all dark seditions through their brightness. - Prophet Mohammad (P.B.U.H) ";
			$hadith[] = "Blessed is the one who is guided to Islam, who has sufficient sustenance, and who is contented with it. - Prophet Mohammad (P.B.U.H) ";
			$hadith[] = "Blessing escapes a meeting wherein participants do not listen to each other. - Prophet Mohammad (P.B.U.H) ";
			return $hadith[array_rand($hadith)];

			
		}
		
	}


?>