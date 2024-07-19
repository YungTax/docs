<?php
if ( ! class_exists( 'redoo_customizer_default' ) ) {
	final class redoo_customizer_default {
		private static $instance = null;
		private $redoo_customize;
		public static function get_instance() {
			if ( null === self::$instance ) {
				self::$instance = new self();
			}
			return self::$instance;
		}
		private function __construct() {
			add_action( 'customize_controls_print_scripts', array( $this, 'redoo_customize_controls_print_scripts' ) );
			add_action( 'customize_register', array( $this, 'redoo_customize_register' ) );
		}
		public function redoo_customize_controls_print_scripts() {
			wp_enqueue_style( 'css-for-customize', get_template_directory_uri() . '/inc/customizer/css/customizer-control.css' );
			wp_enqueue_script( 'js-for-customize', get_template_directory_uri() . '/inc/customizer/js/customizer-control.js', array( 'jquery', 'customize-controls' ) );			
		}
		public function redoo_customize_register( $redoo_customize ) {
			$this->wp_customize = $redoo_customize;
		}

		public function redoo_reset_customizer() {
			$settings = $this->wp_customize->settings();
			foreach ( $settings as $setting ) {
				if ( 'theme_mod' == $setting->type ) {
					remove_theme_mod( $setting->id );
				}
			}
		}
	}
}
redoo_customizer_default::get_instance();

function redoo_register_theme_customizer( $redoo_customize ) {
	class redoo_control_image_select extends WP_Customize_Control {
	    public function render_content(){
	        if ( empty( $this->choices ) ){ return; }
	        if ( ! empty( $this->label ) ) : ?>
					<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
				<?php endif;
				if ( ! empty( $this->description ) ) : ?>
					<span class="description customize-control-description"><?php echo esc_html($this->description) ; ?></span>
			<?php endif;
	        $html = array();
			$tpl  = '<label class="themelazerc-image-select"><img src="%s"><input type="%s" class="hidden" name="%s" value="%s" %s%s></label>';
			$field = $this->input_attrs;
			foreach ( $this->choices as $value => $image )
			{
				$html[] = sprintf(
					$tpl,
					$image,
					$field['multiple'] ? 'checkbox' : 'radio',
					$this->id,
					esc_attr( $value ),
					$this->get_link(),
					checked( $this->value(), $value, false )
				);
			}
			echo implode(' ', $html); 
	    }
	}
	// Header text
	class redoo_Customize_Control_Title extends WP_Customize_Control {
	    public function render_content(){
	        if ( empty( $this->label ) ){ return; }
	        if ( ! empty( $this->label ) ) : ?>
					<h2 class="themelazerc_headding"><?php echo esc_html( $this->label ); ?>
				<?php endif;
				if ( ! empty( $this->description ) ) : ?>
					<span class="description customize-control-description"><?php echo esc_html($this->description) ; ?></span>
			</h2><?php endif; 
	    }
	}
	// Sidebar
	$option_sidebar = array();
	$sidebars = get_option('sbg_sidebars');
	$option_sidebar['']='';
	if(isset($sidebars)) {
		if(is_array($sidebars)) {
			foreach($sidebars as $sidebar) {
				$option_sidebar[$sidebar] = $sidebar;
			}			
		}
	}

	// Font and Google Font
	$faces = array(
	'none' => 'None',
	'arial'     => 'Arial',
	'verdana'   => 'Verdana',
	'trebuchet' => 'Trebuchet',
	'georgia'   => 'Georgia',
	'times'     => 'Times New Roman',
	'tahoma'    => 'Tahoma',
	'serif'    => 'Serif',
	'helvetica' => 'Helvetica',
	"Abel" => "Abel",
	"Abril Fatface" => "Abril Fatface",
	"Aclonica" => "Aclonica",
	"Acme" => "Acme",
	"Actor" => "Actor",
	"Adamina" => "Adamina",
	"Advent Pro" => "Advent Pro",
	"Aguafina Script" => "Aguafina Script",
	"Aladin" => "Aladin",
	"Aldrich" => "Aldrich",
	"Alegreya" => "Alegreya",
	"Alegreya SC" => "Alegreya SC",
	"Alex Brush" => "Alex Brush",
	"Alfa Slab One" => "Alfa Slab One",
	"Alice" => "Alice",
	"Alike" => "Alike",
	"Alike Angular" => "Alike Angular",
	"Allan" => "Allan",
	"Allerta" => "Allerta",
	"Allerta Stencil" => "Allerta Stencil",
	"Allura" => "Allura",
	"Almendra" => "Almendra",
	"Almendra SC" => "Almendra SC",
	"Amarante" => "Amarante",
	"Amaranth" => "Amaranth",
	"Amatic SC" => "Amatic SC",
	"Amethysta" => "Amethysta",
	"Andada" => "Andada",
	"Andika" => "Andika",
	"Angkor" => "Angkor",
	"Annie Use Your Telescope" => "Annie Use Your Telescope",
	"Anonymous Pro" => "Anonymous Pro",
	"Antic" => "Antic",
	"Antic Didone" => "Antic Didone",
	"Antic Slab" => "Antic Slab",
	"Anton" => "Anton",
	"Arapey" => "Arapey",
	"Arbutus" => "Arbutus",
	"Architects Daughter" => "Architects Daughter",
	"Archivo Narrow " => " Archivo Narrow ",
	"Arimo" => "Arimo",
	"Arizonia" => "Arizonia",
	"Armata" => "Armata",
	"Artifika" => "Artifika",
	"Arvo" => "Arvo",
	"Asap" => "Asap",
	"Asset" => "Asset",
	"Astloch" => "Astloch",
	"Asul" => "Asul",
	"Atomic Age" => "Atomic Age",
	"Aubrey" => "Aubrey",
	"Audiowide" => "Audiowide",
	"Average" => "Average",
	"Averia Gruesa Libre" => "Averia Gruesa Libre",
	"Averia Libre" => "Averia Libre",
	"Averia Sans Libre" => "Averia Sans Libre",
	"Averia Serif Libre" => "Averia Serif Libre",
	"Bad Script" => "Bad Script",
	"Balthazar" => "Balthazar",
	"Bangers" => "Bangers",
	"Basic" => "Basic",
	"Barlow" => "Barlow",
	"Barlow Semi Condensed" => "Barlow Semi Condensed",	
	"Baumans" => "Baumans",
	"Bayon" => "Bayon",
	"Belgrano" => "Belgrano",
	"Belleza" => "Belleza",
	"Bentham" => "Bentham",
	"Berkshire Swash" => "Berkshire Swash",
	"Bevan" => "Bevan",
	"Bigshot One" => "Bigshot One",
	"Bilbo" => "Bilbo",
	"Bilbo Swash Caps" => "Bilbo Swash Caps",
	"Bitter" => "Bitter",
	"BioRhyme" => " BioRhyme",
	"Black Ops One" => "Black Ops One",
	"Bokor" => "Bokor",
	"Bonbon" => "Bonbon",
	"Boogaloo" => "Boogaloo",
	"Bowlby One" => "Bowlby One",
	"Bowlby One SC" => "Bowlby One SC",
	"Brawler" => "Brawler",
	"Bree Serif" => "Bree Serif",
	"Bubblegum Sans" => "Bubblegum Sans",
	"Bubbler One" => "Bubbler One",
	"Buda" => "Buda",
	"Buenard" => "Buenard",
	"Butcherman" => "Butcherman",
	"Butterfly Kids" => "Butterfly Kids",
	"Cabin" => "Cabin",
	"Cabin Condensed" => "Cabin Condensed",
	"Cabin Sketch" => "Cabin Sketch",
	"Caesar Dressing" => "Caesar Dressing",
	"Cagliostro" => "Cagliostro",
	"Calligraffitti" => "Calligraffitti",
	"Cambo" => "Cambo",
	"Candal" => "Candal",
	"Cantarell" => "Cantarell",
	"Cantata One" => "Cantata One",
	"Cantora One" => "Cantora One",
	"Capriola" => "Capriola",
	"Cardo" => "Cardo",
	"Carme" => "Carme",
	"Cairo" => "Cairo",
	"Carter One" => "Carter One",
	"Caudex" => "Caudex",
	"Cedarville Cursive" => "Cedarville Cursive",
	"Ceviche One" => "Ceviche One",
	"Changa One" => "Changa One",
	"Chango" => "Chango",
	"Chau Philomene One" => "Chau Philomene One",
	"Chelsea Market" => "Chelsea Market",
	"Chenla" => "Chenla",
	"Cherry Cream Soda" => "Cherry Cream Soda",
	"Chewy" => "Chewy",
	"Chicle" => "Chicle",
	"Chivo" => "Chivo",
	"Coda" => "Coda",
	"Coda Caption" => "Coda Caption",
	"Codystar" => "Codystar",
	"Comfortaa" => "Comfortaa",
	"Coming Soon" => "Coming Soon",
	"Cormorant" => " Cormorant",
	"Cormorant Garamond" => "Cormorant Garamond",
	"Concert One" => "Concert One",
	"Condiment" => "Condiment",
	"Content" => "Content",
	"Contrail One" => "Contrail One",
	"Convergence" => "Convergence",
	"Cookie" => "Cookie",
	"Copse" => "Copse",
	"Corben" => "Corben",
	"Courgette" => "Courgette",
	"Cousine" => "Cousine",
	"Coustard" => "Coustard",
	"Covered By Your Grace" => "Covered By Your Grace",
	"Crafty Girls" => "Crafty Girls",
	"Creepster" => "Creepster",
	"Crete Round" => "Crete Round",
	"Crimson Text" => "Crimson Text",
	"Crushed" => "Crushed",
	"Cuprum" => "Cuprum",
	"Cutive" => "Cutive",
	"Damion" => "Damion",
	"Dancing Script" => "Dancing Script",
	"Dangrek" => "Dangrek",
	"Dawning of a New Day" => "Dawning of a New Day",
	"Days One" => "Days One",
	"Delius" => "Delius",
	"Delius Swash Caps" => "Delius Swash Caps",
	"Delius Unicase" => "Delius Unicase",
	"Della Respira" => "Della Respira",
	"Devonshire" => "Devonshire",
	"Didact Gothic" => "Didact Gothic",
	"Diplomata" => "Diplomata",
	"Diplomata SC" => "Diplomata SC",
	"DM Sans"  => "DM Sans",
	"Doppio One" => "Doppio One",
	"Dorsa" => "Dorsa",
	"Dosis" => "Dosis",
	"Dr Sugiyama" => "Dr Sugiyama",
	"Droid Sans" => "Droid Sans",
	"Droid Sans Mono" => "Droid Sans Mono",
	"Droid Serif" => "Droid Serif",
	"Duru Sans" => "Duru Sans",
	"Dynalight" => "Dynalight",
	"EB Garamond" => "EB Garamond",
	"Eagle Lake" => "Eagle Lake",
	"Eater" => "Eater",
	"Eczar" => "Eczar",
	"Economica" => "Economica",
	"Electrolize" => "Electrolize",
	"Emblema One" => "Emblema One",
	"Emilys Candy" => "Emilys Candy",
	"Engagement" => "Engagement",
	"Enriqueta" => "Enriqueta",
	"Erica One" => "Erica One",
	"Esteban" => "Esteban",
	"Euphoria Script" => "Euphoria Script",
	"Ewert" => "Ewert",
	"Exo" => "Exo",
	"Expletus Sans" => "Expletus Sans",
	"Fjalla One" => "Fjalla One",
	"Fanwood Text" => "Fanwood Text",
	"Fascinate" => "Fascinate",
	"Fascinate Inline" => "Fascinate Inline",
	"Fasthand" => "Fasthand",
	"Federant" => "Federant",
	"Federo" => "Federo",
	"Felipa" => "Felipa",
	"Fira Sans "=> " Fira Sans ",
	"Fjord One" => "Fjord One",
	"Flamenco" => "Flamenco",
	"Flavors" => "Flavors",
	"Fondamento" => "Fondamento",
	"Fontdiner Swanky" => "Fontdiner Swanky",
	"Forum" => "Forum",
	"Francois One" => "Francois One",
	"Fredericka the Great" => "Fredericka the Great",
	"Fredoka One" => "Fredoka One",
	"Freehand" => "Freehand",
	"Fresca" => "Fresca",
	"Frijole" => "Frijole",
	"Fugaz One" => "Fugaz One",
	"GFS Didot" => "GFS Didot",
	"GFS Neohellenic" => "GFS Neohellenic",
	"Galdeano" => "Galdeano",
	"Galindo" => "Galindo",
	"Gentium Basic" => "Gentium Basic",
	"Gentium Book Basic" => "Gentium Book Basic",
	"Geo" => "Geo",
	"Geostar" => "Geostar",
	"Geostar Fill" => "Geostar Fill",
	"Germania One" => "Germania One",
	"Give You Glory" => "Give You Glory",
	"Glass Antiqua" => "Glass Antiqua",
	"Glegoo" => "Glegoo",
	"Gloria Hallelujah" => "Gloria Hallelujah",
	"Goblin One" => "Goblin One",
	"Gochi Hand" => "Gochi Hand",
	"Gorditas" => "Gorditas",
	"Goudy Bookletter 1911" => "Goudy Bookletter 1911",
	"Graduate" => "Graduate",
	"Gravitas One" => "Gravitas One",
	"Great Vibes" => "Great Vibes",
	"Griffy" => "Griffy",
	"Gruppo" => "Gruppo",
	"Gudea" => "Gudea",
	"Habibi" => "Habibi",
	"Hammersmith One" => "Hammersmith One",
	"Handlee" => "Handlee",
	"Hanuman" => "Hanuman",
	"Happy Monkey" => "Happy Monkey",
	"Headland One" => "Headland One",
	"Henny Penny" => "Henny Penny",
	"Herr Von Muellerhoff" => "Herr Von Muellerhoff",
	"Hind" => "Hind",
	"Hind Siliguri" => "Hind Siliguri",
	"Hind Vadodara" => "Hind Vadodara",
	"Holtwood One SC" => "Holtwood One SC",
	"Homemade Apple" => "Homemade Apple",
	"Homenaje" => "Homenaje",
	"IBM Plex Sans" => "IBM Plex Sans",
	"IM Fell DW Pica" => "IM Fell DW Pica",
	"IM Fell DW Pica SC" => "IM Fell DW Pica SC",
	"IM Fell Double Pica" => "IM Fell Double Pica",
	"IM Fell Double Pica SC" => "IM Fell Double Pica SC",
	"IM Fell English" => "IM Fell English",
	"IM Fell English SC" => "IM Fell English SC",
	"IM Fell French Canon" => "IM Fell French Canon",
	"IM Fell French Canon SC" => "IM Fell French Canon SC",
	"IM Fell Great Primer" => "IM Fell Great Primer",
	"IM Fell Great Primer SC" => "IM Fell Great Primer SC",
	"Iceberg" => "Iceberg",
	"Iceland" => "Iceland",
	"Imprima" => "Imprima",
	"Inconsolata" => "Inconsolata",
	"Inder" => "Inder",
	"Indie Flower" => "Indie Flower",
	"Inika" => "Inika",
	"Irish Grover" => "Irish Grover",
	"Istok Web" => "Istok Web",
	"Italiana" => "Italiana",
	"Italianno" => "Italianno",
	"Jacques Francois" => "Jacques Francois",
	"Jacques Francois Shadow" => "Jacques Francois Shadow",
	"Jim Nightshade" => "Jim Nightshade",
	"Jockey One" => "Jockey One",
	"Jolly Lodger" => "Jolly Lodger",
	"Josefin Sans" => "Josefin Sans",
	"Josefin Slab" => "Josefin Slab",
	"Jost"       => "Jost",
	"Judson" => "Judson",
	"Julee" => "Julee",
	"Junge" => "Junge",
	"Jura" => "Jura",
	"Just Another Hand" => "Just Another Hand",
	"Just Me Again Down Here" => "Just Me Again Down Here",
	"Kameron" => "Kameron",
	"Karla" => "Karla",
	"Kaushan Script" => "Kaushan Script",
	"Kelly Slab" => "Kelly Slab",
	"Kenia" => "Kenia",
	"Khmer" => "Khmer",
	"Knewave" => "Knewave",
	"Kotta One" => "Kotta One",
	"Koulen" => "Koulen",
	"Kranky" => "Kranky",
	"Kreon" => "Kreon",
	"Kristi" => "Kristi",
	"Krona One" => "Krona One",
	"La Belle Aurore" => "La Belle Aurore",
	"Lancelot" => "Lancelot",
	"Lato" => "Lato",
	"League Script" => "League Script",
	"Leckerli One" => "Leckerli One",
	"Ledger" => "Ledger",
	"Lekton" => "Lekton",
	"Lemon" => "Lemon",
	"Life Savers" => "Life Savers",
	"Lilita One" => "Lilita One",
	"Limelight" => "Limelight",
	"Libre Franklin" => " Libre Franklin ",

	"Linden Hill" => "Linden Hill",
	"Lobster" => "Lobster",
	"Lobster Two" => "Lobster Two",
	"Londrina Outline" => "Londrina Outline",
	"Londrina Shadow" => "Londrina Shadow",
	"Londrina Sketch" => "Londrina Sketch",
	"Londrina Solid" => "Londrina Solid",
	"Lora" => "Lora",
	"Love Ya Like A Sister" => "Love Ya Like A Sister",
	"Loved by the King" => "Loved by the King",
	"Lovers Quarrel" => "Lovers Quarrel",
	"Luckiest Guy" => "Luckiest Guy",
	"Lusitana" => "Lusitana",
	"Lustria" => "Lustria",
	"Monda" => "Monda",
	"Macondo" => "Macondo",
	"Macondo Swash Caps" => "Macondo Swash Caps",
	"Magra" => "Magra",
	"Maiden Orange" => "Maiden Orange",
	"Mako" => "Mako",
	"Marck Script" => "Marck Script",
	"Marko One" => "Marko One",
	"Marmelad" => "Marmelad",
	"Marvel" => "Marvel",
	"Mate" => "Mate",
	"Mate SC" => "Mate SC",
	"Maven Pro" => "Maven Pro",
	"McLaren" => "McLaren",
	"Meddon" => "Meddon",
	"MedievalSharp" => "MedievalSharp",
	"Medula One" => "Medula One",
	"Megrim" => "Megrim",
	"Meie Script" => "Meie Script",
	"Merienda One" => "Merienda One",
	"Merriweather" => "Merriweather",
	"Metal" => "Metal",
	"Metal Mania" => "Metal Mania",
	"Metamorphous" => "Metamorphous",
	"Metrophobic" => "Metrophobic",
	"Michroma" => "Michroma",
	"Miltonian" => "Miltonian",
	"Miltonian Tattoo" => "Miltonian Tattoo",
	"Miniver" => "Miniver",
	"Miss Fajardose" => "Miss Fajardose",
	"Modern Antiqua" => "Modern Antiqua",
	"Molengo" => "Molengo",
	"Monofett" => "Monofett",
	"Monoton" => "Monoton",
	"Monsieur La Doulaise" => "Monsieur La Doulaise",
	"Montaga" => "Montaga",
	"Montez" => "Montez",
	"Montserrat" => "Montserrat",
	"Moul" => "Moul",
	"Moulpali" => "Moulpali",
	"Mountains of Christmas" => "Mountains of Christmas",
	"Mr Bedfort" => "Mr Bedfort",
	"Mr Dafoe" => "Mr Dafoe",
	"Mr De Haviland" => "Mr De Haviland",
	"Mrs Saint Delafield" => "Mrs Saint Delafield",
	"Mrs Sheppards" => "Mrs Sheppards",
	"Muli" => "Muli",
	"Mystery Quest" => "Mystery Quest",
	"Noto Sans" => "Noto Sans",
	"Neucha" => "Neucha",
	"Neuton" => "Neuton",
	"News Cycle" => "News Cycle",
	"Niconne" => "Niconne",
	"Nixie One" => "Nixie One",
	"Nobile" => "Nobile",
	"Nokora" => "Nokora",
	"Norican" => "Norican",
	"Nosifer" => "Nosifer",
	"Nothing You Could Do" => "Nothing You Could Do",
	"Noticia Text" => "Noticia Text",
	"Noto Sans" =>" Noto Sans",
	"Nova Cut" => "Nova Cut",
	"Nova Flat" => "Nova Flat",
	"Nova Mono" => "Nova Mono",
	"Nova Oval" => "Nova Oval",
	"Nova Round" => "Nova Round",
	"Nova Script" => "Nova Script",
	"Nova Slim" => "Nova Slim",
	"Nova Square" => "Nova Square",
	"Numans" => "Numans",
	"Nunito" => "Nunito",
	"Odor Mean Chey" => "Odor Mean Chey",
	"Old Standard TT" => "Old Standard TT",
	"Oldenburg" => "Oldenburg",
	"Oleo Script" => "Oleo Script",
	"Open Sans" => "Open Sans",
	"Open Sans Condensed" => "Open Sans Condensed",
	"Oranienbaum" => "Oranienbaum",
	"Orbitron" => "Orbitron",
	"Oregano" => "Oregano",
	"Orienta" => "Orienta",
	"Original Surfer" => "Original Surfer",
	"Oswald" => "Oswald",
	"Over the Rainbow" => "Over the Rainbow",
	"Overlock" => "Overlock",
	"Overlock SC" => "Overlock SC",
	"Ovo" => "Ovo",
	"Oxygen" => "Oxygen",
	"Oxygen Mono" => "Oxygen Mono",
	"PT Mono" => "PT Mono",
	"PT Sans" => "PT Sans",
	"PT Sans Caption" => "PT Sans Caption",
	"PT Sans Narrow" => "PT Sans Narrow",
	"PT Serif" => "PT Serif",
	"PT Serif Caption" => "PT Serif Caption",
	"Pacifico" => "Pacifico",
	"Pathway Gothic One" => "Pathway Gothic One",
	"Parisienne" => "Parisienne",
	"Passero One" => "Passero One",
	"Passion One" => "Passion One",
	"Patrick Hand" => "Patrick Hand",
	"Patua One" => "Patua One",
	"Paytone One" => "Paytone One",
	"Peralta" => "Peralta",
	"Permanent Marker" => "Permanent Marker",
	"Petit Formal Script" => "Petit Formal Script",
	"Petrona" => "Petrona",
	"Philosopher" => "Philosopher",
	"Piedra" => "Piedra",
	"Pinyon Script" => "Pinyon Script",
	"Plaster" => "Plaster",
	"Play" => "Play",
	"Playball" => "Playball",
	"Playfair Display" => "Playfair Display",
	"Podkova" => "Podkova",
	"Poiret One" => "Poiret One",
	"Poller One" => "Poller One",
	"Poly" => "Poly",
	"Pompiere" => "Pompiere",
	"Pontano Sans" => "Pontano Sans",
	"Poppins" => "Poppins",
	"Port Lligat Sans" => "Port Lligat Sans",
	"Port Lligat Slab" => "Port Lligat Slab",
	"Prata" => "Prata",
	"Preahvihear" => "Preahvihear",
	"Press Start 2P" => "Press Start 2P",
	"Princess Sofia" => "Princess Sofia",
	"Prociono" => "Prociono",
	"Prosto One" => "Prosto One",
	"Prompt" => "Prompt",
	"Puritan" => "Puritan",
	"Quando" => "Quando",
	"Quantico" => "Quantico",
	"Quattrocento" => "Quattrocento",
	"Quattrocento Sans" => "Quattrocento Sans",
	"Questrial" => "Questrial",
	"Quicksand" => "Quicksand",
	"Qwigley" => "Qwigley",
	"Racing Sans One" => "Racing Sans One",
	"Renner" => "Renner",
	"Radley" => "Radley",
	"Raleway" => "Raleway",
	"Raleway Dots" => "Raleway Dots",
	"Rammetto One" => "Rammetto One",
	"Ranchers" => "Ranchers",
	"Rancho" => "Rancho",
	"Rationale" => "Rationale",
	"Redressed" => "Redressed",
	"Reenie Beanie" => "Reenie Beanie",
	"Revalia" => "Revalia",
	"Ribeye" => "Ribeye",
	"Ribeye Marrow" => "Ribeye Marrow",
	"Righteous" => "Righteous",
	"Rochester" => "Rochester",
	"Rock Salt" => "Rock Salt",
	"Rokkitt" => "Rokkitt",
	"Romanesco" => "Romanesco",
	"Ropa Sans" => "Ropa Sans",
	"Rosario" => "Rosario",
	"Rosarivo" => "Rosarivo",
	"Rouge Script" => "Rouge Script",
	"Rubik" => "Rubik",
	"Ruda" => "Ruda",
	"Ruge Boogie" => "Ruge Boogie",
	"Ruluko" => "Ruluko",
	"Ruslan Display" => "Ruslan Display",
	"Russo One" => "Russo One",
	"Ruthie" => "Ruthie",
	"Roboto" => "Roboto",
	"Roboto Condensed" => "Roboto Condensed",
	"Rye" => "Rye",
	"Sail" => "Sail",
	"Salsa" => "Salsa",
	"Sancreek" => "Sancreek",
	"Sansita One" => "Sansita One",
	"Sarina" => "Sarina",
	"Satisfy" => "Satisfy",
	"Schoolbell" => "Schoolbell",
	"Seaweed Script" => "Seaweed Script",
	"Sevillana" => "Sevillana",
	"Shadows Into Light" => "Shadows Into Light",
	"Shadows Into Light Two" => "Shadows Into Light Two",
	"Shanti" => "Shanti",
	"Share" => "Share",
	"Shojumaru" => "Shojumaru",
	"Short Stack" => "Short Stack",
	"Siemreap" => "Siemreap",
	"Sigmar One" => "Sigmar One",
	"Signika" => "Signika",
	"Signika Negative" => "Signika Negative",
	"Simonetta" => "Simonetta",
	"Sirin Stencil" => "Sirin Stencil",
	"Six Caps" => "Six Caps",
	"Skranji" => "Skranji",
	"Slackey" => "Slackey",
	"Smokum" => "Smokum",
	"Smythe" => "Smythe",
	"Sniglet" => "Sniglet",
	"Snippet" => "Snippet",
	"Sofia" => "Sofia",
	"Sonsie One" => "Sonsie One",
	"Sorts Mill Goudy" => "Sorts Mill Goudy",
	"Source Sans 3" => "Souce Sans 3",
 	"Source Sans Pro" => "Source Sans Pro",
 	"Source Serif Pro" => "Source Serif Pro",
 	"Space Grotesk" => "Space Grotesk",
 	"Space Mono " => "Space Mono ",
	"Special Elite" => "Special Elite",
	"Spicy Rice" => "Spicy Rice",
	"Spinnaker" => "Spinnaker",
	"Spirax" => "Spirax",
	"Squada One" => "Squada One",
	"Stardos Stencil" => "Stardos Stencil",
	"Stint Ultra Condensed" => "Stint Ultra Condensed",
	"Stint Ultra Expanded" => "Stint Ultra Expanded",
	"Stoke" => "Stoke",
	"Sue Ellen Francisco" => "Sue Ellen Francisco",
	"Sunshiney" => "Sunshiney",
	"Supermercado One" => "Supermercado One",
	"Suwannaphum" => "Suwannaphum",
	"Swanky and Moo Moo" => "Swanky and Moo Moo",
	"Syncopate" => "Syncopate",
	"Syne"=> " Syne",

	"Tangerine" => "Tangerine",
	"Taprom" => "Taprom",
	"Telex" => "Telex",
	"Tenor Sans" => "Tenor Sans",
	"The Girl Next Door" => "The Girl Next Door",
	"Tienne" => "Tienne",
	"Tinos" => "Tinos",
	"Titillium Web" => "Titillium Web",
	"Titan One" => "Titan One",
	"Trade Winds" => "Trade Winds",
	"Trocchi" => "Trocchi",
	"Trochut" => "Trochut",
	"Trykker" => "Trykker",
	"Tulpen One" => "Tulpen One",
	"Ubuntu" => "Ubuntu",
	"Ubuntu Condensed" => "Ubuntu Condensed",
	"Ubuntu Mono" => "Ubuntu Mono",
	"Ultra" => "Ultra",
	"Uncial Antiqua" => "Uncial Antiqua",
	"UnifrakturCook" => "UnifrakturCook",
	"UnifrakturMaguntia" => "UnifrakturMaguntia",
	"Unkempt" => "Unkempt",
	"Unlock" => "Unlock",
	"Unna" => "Unna",
	"VT323" => "VT323",
	"Varela" => "Varela",
	"Varela Round" => "Varela Round",
	"Vast Shadow" => "Vast Shadow",
	"Vibur" => "Vibur",
	"Vidaloka" => "Vidaloka",
	"Viga" => "Viga",
	"Voces" => "Voces",
	"Volkhov" => "Volkhov",
	"Vollkorn" => "Vollkorn",
	"Voltaire" => "Voltaire",
	"Work Sans" => "Work Sans",
	"Waiting for the Sunrise" => "Waiting for the Sunrise",
	"Wallpoet" => "Wallpoet",
	"Walter Turncoat" => "Walter Turncoat",
	"Warnes" => "Warnes",
	"Wellfleet" => "Wellfleet",
	"Wire One" => "Wire One",
	"Work Sans" => "Work Sans",
	"Yanone Kaffeesatz" => "Yanone Kaffeesatz",
	"Yellowtail" => "Yellowtail",
	"Yeseva One" => "Yeseva One",
	"Yesteryear" => "Yesteryear",
	"Zeyada" => "Zeyad"
	);
	// Font Size
	$font_sizes = array();
	$font_sizes_px_none = array();
	for ($i = 9; $i <= 50; $i++){ 
		$font_sizes[$i.'px'] = $i.'px';
		$font_sizes_px_none[$i] = $i.'px';
	}
	// Font Weights
	$font_weights  = array(
		'100' => esc_html__('Thin', 'redoo'),
		'200' => esc_html__('Extra-Light', 'redoo'),
		'300' => esc_html__('Light', 'redoo'),
		'400' => esc_html__('Regular', 'redoo'),
		'500' => esc_html__('Medium', 'redoo'),
		'600' => esc_html__('Semi-Bold', 'redoo'),
		'700' => esc_html__('Bold', 'redoo'),
		'800' => esc_html__('Extra-Bold', 'redoo'),
		'900' => esc_html__('Black', 'redoo')
	);
	
	$redoo_customize->add_panel( 'redoo_theme_options', array(
	    'priority' => 1,
	    'title' => esc_html__( 'Theme Options', 'redoo' ),
	    'description' => esc_html__( 'Options for theme customizing', 'redoo' ),
	));

	$redoo_customize->add_section( 
		'redoo_logo_favicon' , 
		array(
   		'title'      => esc_html__( 'Logo', 'redoo' ),
   		'description'=> esc_html__( 'Please choose your logo', 'redoo' ),
   		'priority'  => 1,
   		'panel' => 'redoo_theme_options'
	));
    $redoo_customize->add_setting( 
		'redoo_logo', 
		array(
		'default' 			=> '',
		'transport'   		=> 'refresh',
		'sanitize_callback' => 'sanitize_text_field',	
	));
    $redoo_customize->add_control( 
    	new WP_Customize_Image_Control( 
    	$redoo_customize, 
    	'redoo_logo', 
    	array(
        'label'    => esc_html__( 'Upload your Logo', 'redoo' ),
        'section'  => 'redoo_logo_favicon',
        'settings' => 'redoo_logo'
    )));

    $redoo_customize->add_setting( 
		'redoo_logo_white', 
		array(
		'default' 			=> '',
		'transport'   		=> 'refresh',
		'sanitize_callback' => 'sanitize_text_field',
	));
    $redoo_customize->add_control( 
    	new WP_Customize_Image_Control( 
    	$redoo_customize, 
    	'redoo_logo_white', 
    	array(
        'label'    => esc_html__( 'Sidebar logo', 'redoo' ),
        'section'  => 'redoo_logo_favicon',
        'settings' => 'redoo_logo_white'
    )));

	/*General Setting*/
	$redoo_customize->add_section(
		    'redoo_general_setting',
		    array(
		        'title'     => esc_html__('General Setting', 'redoo'),
		        'priority'  => 1,
		        'panel' => 'redoo_theme_options'
		    )
	);
	$redoo_customize->add_setting(
	    'header_layout_design',
	    array(
	        'default'     => 'header_layout_3',
	        'transport'   => 'refresh',
	        'sanitize_callback' => 'sanitize_text_field',
	    )
	);
	$redoo_customize->add_control(
	    new redoo_control_image_select (
	        $redoo_customize,
	        'header_layout_design',
	        array(
	            'label'      	=> esc_html__( 'Header Layout (header menu and logo)', 'redoo' ),
	            'description'	=> esc_html__('Select header style.', 'redoo'),
	            'section'		=> 'redoo_general_setting',
	            'settings'		=> 'header_layout_design',
	            'choices'		=> array(
	            	'header_layout_1'	=> get_template_directory_uri().'/inc/customizer/images/header1.png',
	            	'header_layout_2'	=> get_template_directory_uri().'/inc/customizer/images/header2.png',
	            	'header_layout_3'	=> get_template_directory_uri().'/inc/customizer/images/header3.png',
	            	'header_layout_4'	=> get_template_directory_uri().'/inc/customizer/images/header4.png',
	            ),
	            'input_attrs' => array(
	            	'multiple' => false
	            )
	        )
	    )
	);	
	// Redoo Footer Layout
	$redoo_customize->add_setting(
	    'footer_layout_design',
	    array(
	        'default'     => 'footer_layout_design_1',
	        'transport'   => 'refresh',
	        'sanitize_callback' => 'sanitize_text_field',
	    )
	);
	$redoo_customize->add_control(
	    new redoo_control_image_select (
	        $redoo_customize,
	        'footer_layout_design',
	        array(
	            'label'      	=> esc_html__( 'Footer Layout (Footer menu and logo)', 'redoo' ),
	            'description'	=> esc_html__('Select Footer style.', 'redoo'),
	            'section'		=> 'redoo_general_setting',
	            'settings'		=> 'footer_layout_design',
	            'choices'		=> array(
	            	'footer_layout_design_1'	=> get_template_directory_uri().'/inc/customizer/images/header1.png',
	            	'footer_layout_design_2'	=> get_template_directory_uri().'/inc/customizer/images/header2.png',
	            
	            ),
	            'input_attrs' => array(
	            	'multiple' => false
	            )
	        )
	    )
	);	
	
	
	// $redoo_customize->add_setting(
	//     'category_layout_design',
	//     array(
	//         'default'     => 'category_layout_1',
	//         'transport'   => 'refresh',
	//         'sanitize_callback' => 'sanitize_text_field',
	//     )
	// );
	// $redoo_customize->add_control(
	//     new redoo_control_image_select (
	//         $redoo_customize,
	//         'category_layout_design',
	//         array(
	//             'label'      	=> esc_html__( 'Category Style', 'redoo' ),
	//             'description'	=> esc_html__('Select category style.', 'redoo'),
	//             'section'		=> 'redoo_general_setting',
	//             'settings'		=> 'category_layout_design',
	//             'choices'		=> array(
	//             	'category_layout_1'	=> get_template_directory_uri().'/inc/customizer/images/cat1.png',
	//             	'category_layout_2'	=> get_template_directory_uri().'/inc/customizer/images/cat2.png'
	//             ),
	//             'input_attrs' => array(
	//             	'multiple' => false
	//             )
	//         )
	//     )
	// );	

	$redoo_customize->add_setting(
	    'theme_color',
	    array(
	        'default'     => '#fc382a',
	        'transport'   => 'refresh',
	        'sanitize_callback' => 'sanitize_hex_color',
	    )
	);
    $redoo_customize->add_control(
	    new WP_Customize_Color_Control(
	        $redoo_customize,
	        'theme_color',
	        array(
	            'label'      => esc_html__( 'Theme color', 'redoo' ),
	            'section'    => 'redoo_general_setting',
	            'settings'   => 'theme_color'
	        )
	    )
	);

	$redoo_customize->add_setting(
	    'body_text_color',
	    array(
	        'default'     => '#000',
	        'transport'   => 'refresh',
	        'sanitize_callback' => 'sanitize_hex_color',
	    )
	);
    $redoo_customize->add_control(
	    new WP_Customize_Color_Control(
	        $redoo_customize,
	        'body_text_color',
	        array(
	            'label'      => esc_html__( 'Body text color', 'redoo' ),
	            'section'    => 'redoo_general_setting',
	            'settings'   => 'body_text_color'
	        )
	    )
	);

    $redoo_customize->add_setting(
	    'body_background_color',
	    array(
	        'default'     => '#fffff',
	        'transport'   => 'refresh',
	        'sanitize_callback' => 'sanitize_hex_color',
	    )
	);
    $redoo_customize->add_control(
	    new WP_Customize_Color_Control(
	        $redoo_customize,
	        'body_background_color',
	        array(
	            'label'      => esc_html__( 'Body Background Color', 'redoo' ),
	            'section'    => 'redoo_general_setting',
	            'settings'   => 'body_background_color'
	        )
	    )
	);
	
	$redoo_customize->add_setting(
        'redoo_other_title',
        array(
            'default'     => '',
            'transport'   => 'refresh',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    $redoo_customize->add_control(
        new redoo_Customize_Control_Title (
            $redoo_customize,
            'redoo_other_title',
            array(
                'label'         => esc_html__( 'Other Setting', 'redoo' ),
                'section'       => 'redoo_general_setting',
                'settings'      => 'redoo_other_title',
            )
        )
    );

	
	// $redoo_customize->add_setting(
	// 	'en_border_radius', 
	// 	array(
	// 		'default' => false, 
	// 		'transport' => 'refresh',
	//         'sanitize_callback' => 'sanitize_text_field',
	// 	)
	// );
	$redoo_customize->add_control(
	    'en_border_radius',
	    array(
	        'section'   => 'redoo_general_setting',
	        'label'     => esc_html__('Enable border radius','redoo'),
	        'type'      => 'checkbox'
	    )
	);

	$redoo_customize->add_setting(
		'disable_top_search', 
		array(
			'default' => false, 
			'transport' => 'refresh',
	        'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$redoo_customize->add_control(
	    'disable_top_search',
	    array(
	        'section'   => 'redoo_general_setting',
	        'label'     => esc_html__('Disable header search','redoo'),
	        'type'      => 'checkbox'
	    )
	);
	$redoo_customize->add_setting(
		'disable_social_icons', 
		array(
			'default' => false, 
			'transport' => 'refresh',
	        'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$redoo_customize->add_control(
	    'disable_social_icons',
	    array(
	        'section'   => 'redoo_general_setting',
	        'label'     => esc_html__('Disable social icons','redoo'),
	        'type'      => 'checkbox'
	    )
	);
		
	/*Typography*/
	$redoo_customize->add_section(
		    'redoo_typography_setting',
		    array(
		        'title'     => esc_html__('Typography', 'redoo'),
		        'priority'  => 1,
		        'panel' => 'redoo_theme_options'
		    )
	);

	$redoo_customize->add_setting(
	    'redoo_menu_settings_title',
	    array(
	        'default'     => '',
	        'transport'   => 'refresh',
	        'sanitize_callback' => 'sanitize_text_field',
	    )
	);
    $redoo_customize->add_control(
	    new redoo_Customize_Control_Title (
	        $redoo_customize,
	        'redoo_menu_settings_title',
	        array(
	            'label'      	=> esc_html__( 'Navigation Settings', 'redoo' ),
	            'section'		=> 'redoo_typography_setting',
	            'settings'		=> 'redoo_menu_settings_title',
	        )
	    )
	);
	$redoo_customize->add_setting(
	    'redoo_menu_font_family',
	    array(
	        'default'     => 'Roboto',
	        'transport'   => 'refresh',
	        'sanitize_callback' => 'sanitize_text_field',
	    )
	);
    $redoo_customize->add_control(
	    'redoo_menu_font_family',
	    array(
	        'section'   => 'redoo_typography_setting',
	        'label'     => esc_html__('Menu font family','redoo'),
	        'type'      => 'select',
	        'choices'	=> $faces
	    )
	);
    $redoo_customize->add_setting(
	    'redoo_menu_font_size',
	    array(
	        'default'     => '12px',
	        'transport'   => 'refresh',
	        'sanitize_callback' => 'sanitize_text_field',
	    )
	);
    $redoo_customize->add_control(
	    'redoo_menu_font_size',
	    array(
	        'section'   => 'redoo_typography_setting',
	        'label'     => esc_html__('Main menu font size','redoo'),
	        'type'      => 'select',
	        'choices'	=> $font_sizes
	    )
	);
	$redoo_customize->add_setting(
	    'redoo_menu_font_weight',
	    array(
	        'default'     => '600',
	        'transport'   => 'refresh',
	        'sanitize_callback' => 'sanitize_text_field',
	    )
	);
    $redoo_customize->add_control(
	    'redoo_menu_font_weight',
	    array(
	        'section'   => 'redoo_typography_setting',
	        'label'     => esc_html__('Main menu font weight','redoo'),
	        'type'      => 'select',
	        'choices'	=> $font_weights
	    )
	);
	$redoo_customize->add_setting(
	    'redoo_menu_transform',
	    array(
	        'default'    =>  'uppercase',
	        'transport'  =>  'refresh',
	        'sanitize_callback' => 'sanitize_text_field',
	    )
	);
	$redoo_customize->add_control(
	    'redoo_menu_transform',
	    array(
	        'section'   => 'redoo_typography_setting',
	        'label'     => esc_html__('Menu text transform','redoo'),
	        'type'      => 'select',
	        'choices' 	=> array(
	        	'none' => esc_html__('None', 'redoo'),
	        	'capitalize' => esc_html__('Capitalize', 'redoo'),
	        	'uppercase' => esc_html__('Uppercase', 'redoo')
	        )
	    )
	);
	$redoo_customize->add_setting(
	    'letter_spacing_menu',
	    array(
	        'default'    =>  '0.09em',
	        'transport'  =>  'refresh',
	        'sanitize_callback' => 'sanitize_text_field',
	    )
	);
	$redoo_customize->add_control(
	    'letter_spacing_menu',
	    array(
	        'section'   => 'redoo_typography_setting',
	        'label'     => esc_html__('Menu letter spacing','redoo'),
	        'type'      => 'text'
	    )
	);

	$redoo_customize->add_setting(
	    'redoo_sub_menu_font_size',
	    array(
	        'default'     => '12px',
	        'transport'   => 'refresh',
	        'sanitize_callback' => 'sanitize_text_field',
	    )
	);
    $redoo_customize->add_control(
	    'redoo_sub_menu_font_size',
	    array(
	        'section'   => 'redoo_typography_setting',
	        'label'     => esc_html__('Sub menu font size','redoo'),
	        'type'      => 'select',
	        'choices'	=> $font_sizes
	    )
	);
	$redoo_customize->add_setting(
	    'redoo_sub_menu_font_weight',
	    array(
	        'default'     => '600',
	        'transport'   => 'refresh',
	        'sanitize_callback' => 'sanitize_text_field',
	    )
	);
    $redoo_customize->add_control(
	    'redoo_sub_menu_font_weight',
	    array(
	        'section'   => 'redoo_typography_setting',
	        'label'     => esc_html__('Sub menu font weight','redoo'),
	        'type'      => 'select',
	        'choices'	=> $font_weights
	    )
	);

	$redoo_customize->add_setting(
	    'redoo_sub_menu_transform',
	    array(
	        'default'    =>  'capitalize',
	        'transport'  =>  'refresh',
	        'sanitize_callback' => 'sanitize_text_field',
	    )
	);
	$redoo_customize->add_control(
	    'redoo_sub_menu_transform',
	    array(
	        'section'   => 'redoo_typography_setting',
	        'label'     => esc_html__('Sub Menu text transform','redoo'),
	        'type'      => 'select',
	        'choices' 	=> array(
	        	'none' => esc_html__('None', 'redoo'),
	        	'capitalize' => esc_html__('Capitalize', 'redoo'),
	        	'uppercase' => esc_html__('Uppercase', 'redoo')
	        )
	    )
	);

	$redoo_customize->add_setting(
	    'letter_spacing_sub_menu',
	    array(
	        'default'    =>  '0px',
	        'transport'  =>  'refresh',
	        'sanitize_callback' => 'sanitize_text_field',
	    )
	);
	$redoo_customize->add_control(
	    'letter_spacing_sub_menu',
	    array(
	        'section'   => 'redoo_typography_setting',
	        'label'     => esc_html__('Sub Menu letter spacing','redoo'),
	        'type'      => 'text'
	    )
	);

	$redoo_customize->add_setting(
	    'redoo_p_settings_title',
	    array(
	        'default'     => '',
	        'transport'   => 'refresh',
	        'sanitize_callback' => 'sanitize_text_field',
	    )
	);
    $redoo_customize->add_control(
	    new redoo_Customize_Control_Title (
	        $redoo_customize,
	        'redoo_p_settings_title',
	        array(
	            'label'      	=> esc_html__( 'Paragraph Settings', 'redoo' ),
	            'section'		=> 'redoo_typography_setting',
	            'settings'		=> 'redoo_p_settings_title',
	        )
	    )
	);

	$redoo_customize->add_setting(
	    'redoo_p_font_family',
	    array(
	        'default'     => 'Roboto',
	        'transport'   => 'refresh',
	        'sanitize_callback' => 'sanitize_text_field',
	    )
	);
    $redoo_customize->add_control(
	    'redoo_p_font_family',
	    array(
	        'section'   => 'redoo_typography_setting',
	        'label'     => esc_html__('Paragraph font family','redoo'),
	        'type'      => 'select',
	        'choices'	=> $faces
	    )
	);
	$redoo_customize->add_setting(
	    'redoo_p_font_size',
	    array(
	        'default'     => '16px',
	        'transport'   => 'refresh',
	        'sanitize_callback' => 'sanitize_text_field',
	    )
	);
    $redoo_customize->add_control(
	    'redoo_p_font_size',
	    array(
	        'section'   => 'redoo_typography_setting',
	        'label'     => esc_html__('Paragraph font size','redoo'),
	        'type'      => 'select',
	        'choices'	=> $font_sizes
	    )
	);
	$redoo_customize->add_setting(
	    'redoo_p_font_weight',
	    array(
	        'default'     => '400',
	        'transport'   => 'refresh',
	        'sanitize_callback' => 'sanitize_text_field',
	    )
	);
    $redoo_customize->add_control(
	    'redoo_p_font_weight',
	    array(
	        'section'   => 'redoo_typography_setting',
	        'label'     => esc_html__('Paragraph font weight','redoo'),
	        'type'      => 'select',
	        'choices'	=> $font_weights
	    )
	);
    // ======================================
    // Categotry Font
    //======================================= 
    $redoo_customize->add_setting(
	    'redoo_Category_settings_title',
	    array(
	        'default'     => '',
	        'transport'   => 'refresh',
	        'sanitize_callback' => 'sanitize_text_field',
	    )
	);
    $redoo_customize->add_control(
	    new redoo_Customize_Control_Title (
	        $redoo_customize,
	        'redoo_Category_settings_title',
	        array(
	            'label'      	=> esc_html__( 'Category Style Settings', 'redoo' ),
	            'section'		=> 'redoo_typography_setting',
	            'settings'		=> 'redoo_Category_settings_title',
	        )
	    )
	);

	$redoo_customize->add_setting(
	    'redoo_category_font_family',
	    array(
	        'default'     => 'Charm',
	        'transport'   => 'refresh',
	        'sanitize_callback' => 'sanitize_text_field',
	    )
	);
    $redoo_customize->add_control(
	    'redoo_category_font_family',
	    array(
	        'section'   => 'redoo_typography_setting',
	        'label'     => esc_html__('Category font family','redoo'),
	        'type'      => 'select',
	        'choices'	=> $faces
	    )
	);
	$redoo_customize->add_setting(
	    'redoo_category_font_size',
	    array(
	        'default'     => '16px',
	        'transport'   => 'refresh',
	        'sanitize_callback' => 'sanitize_text_field',
	    )
	);
    $redoo_customize->add_control(
	    'redoo_category_font_size',
	    array(
	        'section'   => 'redoo_typography_setting',
	        'label'     => esc_html__('Category font size','redoo'),
	        'type'      => 'select',
	        'choices'	=> $font_sizes
	    )
	);
	$redoo_customize->add_setting(
	    'redoo_category_font_weight',
	    array(
	        'default'     => '700',
	        'transport'   => 'refresh',
	        'sanitize_callback' => 'sanitize_text_field',
	    )
	);
    $redoo_customize->add_control(
	    'redoo_category_font_weight',
	    array(
	        'section'   => 'redoo_typography_setting',
	        'label'     => esc_html__('Category font weight','redoo'),
	        'type'      => 'select',
	        'choices'	=> $font_weights
	    )
	);
    //====================================================================== 
   
	$redoo_customize->add_setting(
	    'redoo_title_settings_title',
	    array(
	        'default'     => '',
	        'transport'   => 'refresh',
	        'sanitize_callback' => 'sanitize_text_field',
	    )
	);
    $redoo_customize->add_control(
	    new redoo_Customize_Control_Title (
	        $redoo_customize,
	        'redoo_title_settings_title',
	        array(
	            'label'      	=> esc_html__( 'Title Settings', 'redoo' ),
	            'section'		=> 'redoo_typography_setting',
	            'settings'		=> 'redoo_title_settings_title',
	        )
	    )
	);
	$redoo_customize->add_setting(
	    'redoo_title_font_family',
	    array(
	        'default'     => 'Work Sans',
	        'transport'   => 'refresh',
	        'sanitize_callback' => 'sanitize_text_field',
	    )
	);
    $redoo_customize->add_control(
	    'redoo_title_font_family',
	    array(
	        'section'   => 'redoo_typography_setting',
	        'label'     => esc_html__('Title font family','redoo'),
	        'type'      => 'select',
	        'choices'	=> $faces
	    )
	);
	$redoo_customize->add_setting(
	    'redoo_title_font_weight',
	    array(
	        'default'     => '700',
	        'transport'   => 'refresh',
	        'sanitize_callback' => 'sanitize_text_field',
	    )
	);
    $redoo_customize->add_control(
	    'redoo_title_font_weight',
	    array(
	        'section'   => 'redoo_typography_setting',
	        'label'     => esc_html__('Title font weight','redoo'),
	        'type'      => 'select',
	        'choices'	=> $font_weights
	    )
	);	
	$redoo_customize->add_setting(
	    'redoo_title_transform',
	    array(
	        'default'    =>  'capitalize',
	        'transport'  =>  'refresh',
	        'sanitize_callback' => 'sanitize_text_field',
	    )
	);
	$redoo_customize->add_control(
	    'redoo_title_transform',
	    array(
	        'section'   => 'redoo_typography_setting',
	        'label'     => esc_html__('Title text transform','redoo'),
	        'type'      => 'select',
	        'choices' 	=> array(
	        	'none' => esc_html__('None', 'redoo'),
	        	'capitalize' => esc_html__('Capitalize', 'redoo'),
	        	'uppercase' => esc_html__('Uppercase', 'redoo')
	        )
	    )
	);

	$redoo_customize->add_setting(
	    'letter_spacing_heading',
	    array(
	        'default'    =>  '-0.03em',
	        'transport'  =>  'refresh',
	        'sanitize_callback' => 'sanitize_text_field',
	    )
	);
	$redoo_customize->add_control(
	    'letter_spacing_heading',
	    array(
	        'section'   => 'redoo_typography_setting',
	        'label'     => esc_html__('Title letter spacing','redoo'),
	        'type'      => 'text'
	    )
	);

	$redoo_customize->add_setting(
	    'line_height_heading',
	    array(
	        'default'    =>  '1.3',
	        'transport'  =>  'refresh',
	        'sanitize_callback' => 'sanitize_text_field',
	    )
	);
	$redoo_customize->add_control(
	    'line_height_heading',
	    array(
	        'section'   => 'redoo_typography_setting',
	        'label'     => esc_html__('Title line height','redoo'),
	        'type'      => 'text'
	    )
	);



	/*Blog & single post*/
	$redoo_customize->add_section(
		    'redoo_blog_single_setting',
		    array(
		        'title'     => esc_html__('Blog & single post', 'redoo'),
		        'priority'  => 1,
		        'panel' => 'redoo_theme_options'
		    )
	);
	$redoo_customize->add_setting(
	    'single_post_layout_options',
	    array(
	        'default'    =>  'single_post_default',
	        'transport'  =>  'refresh',
	        'sanitize_callback' => 'sanitize_text_field',
	    )
	);
	$redoo_customize->add_control(
	    'single_post_layout_options',
	    array(
	        'section'   => 'redoo_blog_single_setting',
	        'label'     => esc_html__('Single Post Layout','redoo'),
	        'type'      => 'radio',
	        'choices'	=> array(
	        'single_post_default' => esc_html__('Default Layout', 'redoo'),
			'single_post_full' => esc_html__('Full header', 'redoo'),
			'single_post_full_two' => esc_html__('Full Header Layout Two', 'redoo')				
	        )
	    )
	);

	$redoo_customize->add_setting(
		'disable_post_date', 
		array(
			'default' => false, 
			'transport' => 'refresh',
	        'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$redoo_customize->add_control(
	    'disable_post_date',
	    array(
	        'section'   => 'redoo_blog_single_setting',
	        'label'     => esc_html__('Disable post date','redoo'),
	        'type'      => 'checkbox'
	    )
	);
	$redoo_customize->add_setting(
		'disable_post_author', 
		array(
			'default' => false, 
			'transport' => 'refresh',
	        'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$redoo_customize->add_control(
	    'disable_post_author',
	    array(
	        'section'   => 'redoo_blog_single_setting',
	        'label'     => esc_html__('Disable post author','redoo'),
	        'type'      => 'checkbox'
	    )
	);
	$redoo_customize->add_setting(
		'disable_post_category', 
		array(
			'default' => false, 
			'transport' => 'refresh',
	        'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$redoo_customize->add_control(
	    'disable_post_category',
	    array(
	        'section'   => 'redoo_blog_single_setting',
	        'label'     => esc_html__('Disable post category','redoo'),
	        'type'      => 'checkbox'
	    )
	);
	$redoo_customize->add_setting(
		'disable_post_comment_meta', 
		array(
			'default' => false, 
			'transport' => 'refresh',
	        'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$redoo_customize->add_control(
	    'disable_post_comment_meta',
	    array(
	        'section'   => 'redoo_blog_single_setting',
	        'label'     => esc_html__('Disable post comment meta','redoo'),
	        'type'      => 'checkbox'
	    )
	);
	$redoo_customize->add_setting(
		'disable_post_tag', 
		array(
			'default' => false, 
			'transport' => 'refresh',
	        'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$redoo_customize->add_control(
	    'disable_post_tag',
	    array(
	        'section'   => 'redoo_blog_single_setting',
	        'label'     => esc_html__('Disable post tag','redoo'),
	        'type'      => 'checkbox'
	    )
	);
	$redoo_customize->add_setting(
		'disable_post_share', 
		array(
			'default' => false, 
			'transport' => 'refresh',
	        'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$redoo_customize->add_control(
	    'disable_post_share',
	    array(
	        'section'   => 'redoo_blog_single_setting',
	        'label'     => esc_html__('Disable post share','redoo'),
	        'type'      => 'checkbox'
	    )
	);
	$redoo_customize->add_setting(
		'disable_post_related', 
		array(
			'default' => false, 
			'transport' => 'refresh',
	        'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$redoo_customize->add_control(
	    'disable_post_related',
	    array(
	        'section'   => 'redoo_blog_single_setting',
	        'label'     => esc_html__('Disable post related','redoo'),
	        'type'      => 'checkbox'
	    )
	);
	$redoo_customize->add_setting(
		'disable_post_view', 
		array(
			'default' => false, 
			'transport' => 'refresh',
	        'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$redoo_customize->add_control(
	    'disable_post_view',
	    array(
	        'section'   => 'redoo_blog_single_setting',
	        'label'     => esc_html__('Disable post view','redoo'),
	        'type'      => 'checkbox'
	    )
	);
	$redoo_customize->add_setting(
		'disable_time_read', 
		array(
			'default' => false, 
			'transport' => 'refresh',
	        'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$redoo_customize->add_control(
	    'disable_time_read',
	    array(
	        'section'   => 'redoo_blog_single_setting',
	        'label'     => esc_html__('Disable Time Read','redoo'),
	        'type'      => 'checkbox'
	    )
	);

	// $redoo_customize->add_setting(
	// 	'disable_post_love', 
	// 	array(
	// 		'default' => false, 
	// 		'transport' => 'refresh',
	//         'sanitize_callback' => 'sanitize_text_field',
	// 	)
	// );
	// $redoo_customize->add_control(
	//     'disable_post_love',
	//     array(
	//         'section'   => 'redoo_blog_single_setting',
	//         'label'     => esc_html__('Disable post love','redoo'),
	//         'type'      => 'checkbox'
	//     )
	// );

	$redoo_customize->add_setting(
		'disable_post_nav', 
		array(
			'default' => false, 
			'transport' => 'refresh',
	        'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$redoo_customize->add_control(
	    'disable_post_nav',
	    array(
	        'section'   => 'redoo_blog_single_setting',
	        'label'     => esc_html__('Disable post navigation','redoo'),
	        'type'      => 'checkbox'
	    )
	);

	/*Social Header Link*/
	$redoo_customize->add_section(
		    'redoo_social_setting',
		    array(
		        'title'     => esc_html__('Social Header Link', 'redoo'),
		        'priority'  => 1,
		        'panel' => 'redoo_theme_options'
		    )
	);

	$redoo_customize->add_setting(
	    'themelazer_fl_title',
	    array(
	        'default'    =>  esc_html__('Follow us','redoo'),
	        'transport'  =>  'refresh',
	        'sanitize_callback' => 'sanitize_text_field',
	    )
	);
	$redoo_customize->add_control(
	    'themelazer_fl_title',
	    array(
	        'section'   => 'redoo_social_setting',
	        'label'     => esc_html__('Social title','redoo'),
	        'type'      => 'text'
	    )
	);

	$redoo_customize->add_setting(
	    'facebook',
	    array(
	        'default'    =>  '#',
	        'transport'  =>  'refresh',
	        'sanitize_callback' => 'sanitize_text_field',
	    )
	);
	$redoo_customize->add_control(
	    'facebook',
	    array(
	        'section'   => 'redoo_social_setting',
	        'label'     => esc_html__('Facebook','redoo'),
	        'type'      => 'text'
	    )
	);

	$redoo_customize->add_setting(
	    'vk',
	    array(
	        'default'    =>  '',
	        'transport'  =>  'refresh',
	        'sanitize_callback' => 'sanitize_text_field',
	    )
	);
	$redoo_customize->add_control(
	    'vk',
	    array(
	        'section'   => 'redoo_social_setting',
	        'label'     => esc_html__('VK','redoo'),
	        'type'      => 'text'
	    )
	);

	$redoo_customize->add_setting(
	    'telegram',
	    array(
	        'default'    =>  '',
	        'transport'  =>  'refresh',
	        'sanitize_callback' => 'sanitize_text_field',
	    )
	);
	$redoo_customize->add_control(
	    'telegram',
	    array(
	        'section'   => 'redoo_social_setting',
	        'label'     => esc_html__('Telegram','redoo'),
	        'type'      => 'text'
	    )
	);	

	$redoo_customize->add_setting(
	    'behance',
	    array(
	        'default'    =>  '#',
	        'transport'  =>  'refresh',
	        'sanitize_callback' => 'sanitize_text_field',
	    )
	);
	$redoo_customize->add_control(
	    'behance',
	    array(
	        'section'   => 'redoo_social_setting',
	        'label'     => esc_html__('Behance','redoo'),
	        'type'      => 'text'
	    )
	);

	$redoo_customize->add_setting(
	    'vimeo',
	    array(
	        'default'    =>  '#',
	        'transport'  =>  'refresh',
	        'sanitize_callback' => 'sanitize_text_field',
	    )
	);
	$redoo_customize->add_control(
	    'vimeo',
	    array(
	        'section'   => 'redoo_social_setting',
	        'label'     => esc_html__('Vimeo','redoo'),
	        'type'      => 'text'
	    )
	);

	$redoo_customize->add_setting(
	    'youtube',
	    array(
	        'default'    =>  '',
	        'transport'  =>  'refresh',
	        'sanitize_callback' => 'sanitize_text_field',
	    )
	);
	$redoo_customize->add_control(
	    'youtube',
	    array(
	        'section'   => 'redoo_social_setting',
	        'label'     => esc_html__('Youtube','redoo'),
	        'type'      => 'text'
	    )
	);

	$redoo_customize->add_setting(
	    'instagram',
	    array(
	        'default'    =>  '',
	        'transport'  =>  'refresh',
	        'sanitize_callback' => 'sanitize_text_field',
	    )
	);
	$redoo_customize->add_control(
	    'instagram',
	    array(
	        'section'   => 'redoo_social_setting',
	        'label'     => esc_html__('Instagram','redoo'),
	        'type'      => 'text'
	    )
	);

	$redoo_customize->add_setting(
	    'linkedin',
	    array(
	        'default'    =>  '',
	        'transport'  =>  'refresh',
	        'sanitize_callback' => 'sanitize_text_field',
	    )
	);
	$redoo_customize->add_control(
	    'linkedin',
	    array(
	        'section'   => 'redoo_social_setting',
	        'label'     => esc_html__('Linkedin','redoo'),
	        'type'      => 'text'
	    )
	);

	$redoo_customize->add_setting(
	    'pinterest',
	    array(
	        'default'    =>  '',
	        'transport'  =>  'refresh',
	        'sanitize_callback' => 'sanitize_text_field',
	    )
	);
	$redoo_customize->add_control(
	    'pinterest',
	    array(
	        'section'   => 'redoo_social_setting',
	        'label'     => esc_html__('Pinterest','redoo'),
	        'type'      => 'text'
	    )
	);

	$redoo_customize->add_setting(
	    'twitter',
	    array(
	        'default'    =>  '',
	        'transport'  =>  'refresh',
	        'sanitize_callback' => 'sanitize_text_field',
	    )
	);
	$redoo_customize->add_control(
	    'twitter',
	    array(
	        'section'   => 'redoo_social_setting',
	        'label'     => esc_html__('Twitter','redoo'),
	        'type'      => 'text'
	    )
	);

	$redoo_customize->add_setting(
	    'deviantart',
	    array(
	        'default'    =>  '',
	        'transport'  =>  'refresh',
	        'sanitize_callback' => 'sanitize_text_field',
	    )
	);
	$redoo_customize->add_control(
	    'deviantart',
	    array(
	        'section'   => 'redoo_social_setting',
	        'label'     => esc_html__('Deviantart','redoo'),
	        'type'      => 'text'
	    )
	);

	$redoo_customize->add_setting(
	    'dribble',
	    array(
	        'default'    =>  '',
	        'transport'  =>  'refresh',
	        'sanitize_callback' => 'sanitize_text_field',
	    )
	);
	$redoo_customize->add_control(
	    'dribble',
	    array(
	        'section'   => 'redoo_social_setting',
	        'label'     => esc_html__('Dribble','redoo'),
	        'type'      => 'text'
	    )
	);

	$redoo_customize->add_setting(
	    'dropbox',
	    array(
	        'default'    =>  '',
	        'transport'  =>  'refresh',
	        'sanitize_callback' => 'sanitize_text_field',
	    )
	);
	$redoo_customize->add_control(
	    'dropbox',
	    array(
	        'section'   => 'redoo_social_setting',
	        'label'     => esc_html__('Dropbox','redoo'),
	        'type'      => 'text'
	    )
	);

	$redoo_customize->add_setting(
	    'rss',
	    array(
	        'default'    =>  '',
	        'transport'  =>  'refresh',
	        'sanitize_callback' => 'sanitize_text_field',
	    )
	);
	$redoo_customize->add_control(
	    'rss',
	    array(
	        'section'   => 'redoo_social_setting',
	        'label'     => esc_html__('RSS','redoo'),
	        'type'      => 'text'
	    )
	);

	$redoo_customize->add_setting(
	    'skype',
	    array(
	        'default'    =>  '',
	        'transport'  =>  'refresh',
	        'sanitize_callback' => 'sanitize_text_field',
	    )
	);
	$redoo_customize->add_control(
	    'skype',
	    array(
	        'section'   => 'redoo_social_setting',
	        'label'     => esc_html__('Skype','redoo'),
	        'type'      => 'text'
	    )
	);

	$redoo_customize->add_setting(
	    'stumbleupon',
	    array(
	        'default'    =>  '',
	        'transport'  =>  'refresh',
	        'sanitize_callback' => 'sanitize_text_field',
	    )
	);
	$redoo_customize->add_control(
	    'stumbleupon',
	    array(
	        'section'   => 'redoo_social_setting',
	        'label'     => esc_html__('Stumbleupon','redoo'),
	        'type'      => 'text'
	    )
	);

	$redoo_customize->add_setting(
	    'wordpress',
	    array(
	        'default'    =>  '',
	        'transport'  =>  'refresh',
	        'sanitize_callback' => 'sanitize_text_field',
	    )
	);
	$redoo_customize->add_control(
	    'wordpress',
	    array(
	        'section'   => 'redoo_social_setting',
	        'label'     => esc_html__('WordPress','redoo'),
	        'type'      => 'text'
	    )
	);

	$redoo_customize->add_setting(
	    'yahoo',
	    array(
	        'default'    =>  '',
	        'transport'  =>  'refresh',
	        'sanitize_callback' => 'sanitize_text_field',
	    )
	);
	$redoo_customize->add_control(
	    'yahoo',
	    array(
	        'section'   => 'redoo_social_setting',
	        'label'     => esc_html__('Yahoo','redoo'),
	        'type'      => 'text'
	    )
	);

	$redoo_customize->add_setting(
	    'sound_cloud',
	    array(
	        'default'    =>  '',
	        'transport'  =>  'refresh',
	        'sanitize_callback' => 'sanitize_text_field',
	    )
	);
	$redoo_customize->add_control(
	    'sound_cloud',
	    array(
	        'section'   => 'redoo_social_setting',
	        'label'     => esc_html__('Sound Cloud','redoo'),
	        'type'      => 'text'
	    )
	);

	/*Footer*/
	$redoo_customize->add_section(
		    'redoo_footer_setting',
		    array(
		        'title'     => esc_html__('Footer', 'redoo'),
		        'priority'  => 1,
		        'panel' => 'redoo_theme_options'
		    )
	);	   

	$redoo_customize->add_setting(
        'redoo_footer_opt',
        array(
            'default'     => '',
            'transport'   => 'refresh',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    $redoo_customize->add_control(
        new redoo_Customize_Control_Title (
            $redoo_customize,
            'redoo_footer_opt',
            array(
                'label'         => esc_html__( 'Footer Options', 'redoo' ),
                'section'       => 'redoo_footer_setting',
                'settings'      => 'redoo_footer_opt',
            )
        )
    );
	$redoo_customize->add_setting(
	    'footer_columns',
	    array(
	        'default'    =>  'footer3col',
	        'transport'  =>  'refresh',
	        'sanitize_callback' => 'sanitize_text_field',
	    )
	);
	$redoo_customize->add_control(
	    'footer_columns',
	    array(
	        'section'   => 'redoo_footer_setting',
	        'label'     => esc_html__('Footer columns','redoo'),
	        'type'      => 'radio',
	        'choices'	=> array(
	        'footer4col' => esc_html__('Footer 4 columns', 'redoo'),
			'footer3col' => esc_html__('Footer 3 columns', 'redoo'),
			'footer2col' => esc_html__('Footer 2 columns', 'redoo'),
			'footer1col' => esc_html__('Footer 1 columns', 'redoo'),
			'footer0col' => esc_html__('No Footer', 'redoo')
	        )
	    )
	);
	$redoo_customize->add_setting(
	    'themelazer_copyright',
	    array(
	        'default'    =>  esc_html__('© Copyright 2023 Themelazer. All Rights Reserved Powered by Themelazer', 'redoo'),
	        'transport'  =>  'refresh',
	        'sanitize_callback' => 'wp_kses_post',
	    )
	);
	$redoo_customize->add_control(
	    'themelazer_copyright',
	    array(
	        'section'   => 'redoo_footer_setting',
	        'label'     => esc_html__('Footer copyright','redoo'),
	        'type'      => 'textarea'
	    )
	);
	
$redoo_customize->remove_section( 'colors' );
$redoo_customize->remove_section( 'background_image' );
}
add_action( 'customize_register', 'redoo_register_theme_customizer', 110 );
