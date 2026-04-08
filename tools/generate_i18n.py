from __future__ import annotations

import struct
from pathlib import Path


ROOT = Path(__file__).resolve().parents[1]
LANG_DIR = ROOT / "languages"
POT_PATH = LANG_DIR / "plx-parallax.pot"
DOMAIN = "plx-parallax"

MESSAGES = [
    ("404", "404", "404", "404"),
    ("That page does not exist.", "Den sidan finns inte.", "Diese Seite existiert nicht.", "Esa pagina no existe."),
    ("Go home", "Gå till startsidan", "Zur Startseite", "Ir al inicio"),
    ("Open blog", "Öppna bloggen", "Blog öffnen", "Abrir el blog"),
    ("Previous", "Föregående", "Zurück", "Anterior"),
    ("Next", "Nästa", "Weiter", "Siguiente"),
    ("Archive", "Arkiv", "Archiv", "Archivo"),
    ("No archive entries found.", "Inga arkivinlägg hittades.", "Keine Archiveinträge gefunden.", "No se encontraron entradas de archivo."),
    ("There is no content in this archive yet. Try another section or return to the front page.", "Det finns inget innehåll i detta arkiv ännu. Prova en annan sektion eller gå tillbaka till startsidan.", "In diesem Archiv gibt es noch keine Inhalte. Versuchen Sie einen anderen Bereich oder kehren Sie zur Startseite zurück.", "Todavia no hay contenido en este archivo. Prueba otra seccion o vuelve a la pagina de inicio."),
    ("Back to front page", "Tillbaka till startsidan", "Zurück zur Startseite", "Volver a la pagina de inicio"),
    ("Selected pages", "Utvalda sidor", "Ausgewählte Seiten", "Paginas seleccionadas"),
    ("Call to action", "Uppmaning", "Handlungsaufforderung", "Llamada a la accion"),
    ("Parallax WordPress Theme", "Parallax WordPress-tema", "Parallax-WordPress-Theme", "Tema WordPress Parallax"),
    ("Build depth into every scroll.", "Bygg in djup i varje scroll.", "Bringen Sie Tiefe in jeden Scroll.", "Añade profundidad a cada desplazamiento."),
    ("A sharp, responsive theme with flexible gradients, background imagery, typography controls, and motion tuned for both desktop and mobile.", "Ett skarpt, responsivt tema med flexibla gradients, bakgrundsbilder, typografikontroller och rörelse justerad för både desktop och mobil.", "Ein klares, responsives Theme mit flexiblen Verläufen, Hintergrundbildern, Typografie-Steuerung und Bewegung, abgestimmt auf Desktop und Mobilgeräte.", "Un tema nitido y adaptable con degradados flexibles, imagenes de fondo, controles tipograficos y movimiento ajustado tanto para escritorio como para movil."),
    ("Explore the layout", "Utforska layouten", "Layout erkunden", "Explorar el diseño"),
    ("Read the latest posts", "Läs de senaste inläggen", "Neueste Beiträge lesen", "Leer las ultimas entradas"),
    ("Theme profile", "Temaprofil", "Theme-Profil", "Perfil del tema"),
    ("Fluid", "Flytande", "Fließend", "Fluido"),
    ("Responsive across desktop, tablet, and mobile.", "Responsivt på desktop, surfplatta och mobil.", "Responsiv auf Desktop, Tablet und Mobilgeräten.", "Adaptable en escritorio, tableta y movil."),
    ("Custom", "Anpassat", "Individuell", "Personalizado"),
    ("Fonts, colors, images, and gradients from Customizer.", "Typsnitt, färger, bilder och gradients från Anpassaren.", "Schriftarten, Farben, Bilder und Verläufe aus dem Customizer.", "Fuentes, colores, imagenes y degradados desde el Personalizador."),
    ("Motion", "Rörelse", "Bewegung", "Movimiento"),
    ("Parallax tuned with optional mobile fallback.", "Parallax justerad med valbar mobil fallback.", "Parallax mit optionalem Fallback für Mobilgeräte abgestimmt.", "Parallax ajustado con alternativa opcional para movil."),
    ("Editorial", "Redaktionell", "Redaktionell", "Editorial"),
    ("Strong visual rhythm for landing pages and content.", "Stark visuell rytm för landningssidor och innehåll.", "Starker visueller Rhythmus für Landingpages und Inhalte.", "Un ritmo visual potente para paginas de destino y contenido."),
    ("A front page that feels layered, not flat.", "En startsida som känns lagerbyggd, inte platt.", "Eine Startseite, die sich geschichtet statt flach anfühlt.", "Una portada que se siente en capas, no plana."),
    ("The theme uses image depth, gradient composition, and restrained motion to create presence without breaking usability. Adjust the visual system from the Customizer and keep the layout seamless on both large and small screens.", "Temat använder bilddjup, gradientkomposition och återhållsam rörelse för att skapa närvaro utan att förstöra användbarheten. Justera det visuella systemet i Anpassaren och behåll layouten sömlös på både stora och små skärmar.", "Das Theme nutzt Bildtiefe, Verlaufskomposition und zurückhaltende Bewegung, um Präsenz zu schaffen, ohne die Benutzerfreundlichkeit zu beeinträchtigen. Passen Sie das visuelle System im Customizer an und halten Sie das Layout auf großen und kleinen Bildschirmen nahtlos.", "El tema usa profundidad de imagen, composicion de degradados y movimiento contenido para crear presencia sin romper la usabilidad. Ajusta el sistema visual desde el Personalizador y mantén el diseño fluido tanto en pantallas grandes como pequeñas."),
    ("Gradient control", "Gradientkontroll", "Verlaufskontrolle", "Control del degradado"),
    ("Three gradient stops, adjustable angle, and overlay intensity.", "Tre gradientstopp, justerbar vinkel och overlay-intensitet.", "Drei Farbverlaufspunkte, anpassbarer Winkel und Overlay-Intensität.", "Tres puntos de degradado, angulo ajustable e intensidad de superposicion."),
    ("Image layers", "Bildlager", "Bildebenen", "Capas de imagen"),
    ("Hero and panel imagery can be swapped without editing templates.", "Hero- och panelbilder kan bytas utan att redigera mallarna.", "Hero- und Panelbilder können ausgetauscht werden, ohne Templates zu bearbeiten.", "Las imagenes del hero y de los paneles pueden cambiarse sin editar las plantillas."),
    ("Behavior tuning", "Beteendejustering", "Verhaltensabstimmung", "Ajuste del comportamiento"),
    ("Sticky header, smooth scroll, parallax speed, and mobile handling.", "Klistrad header, mjuk scroll, parallaxhastighet och mobilhantering.", "Sticky Header, sanftes Scrollen, Parallax-Geschwindigkeit und Mobilverhalten.", "Cabecera fija, desplazamiento suave, velocidad de parallax y comportamiento movil."),
    ("Start with a static front page.", "Börja med en statisk startsida.", "Beginnen Sie mit einer statischen Startseite.", "Empieza con una pagina de inicio estatica."),
    ("Create a page in WordPress, assign it as your homepage, and its content will appear here under the parallax hero.", "Skapa en sida i WordPress, ange den som startsida och dess innehåll visas här under parallax-heron.", "Erstellen Sie eine Seite in WordPress, weisen Sie sie als Startseite zu, und ihr Inhalt erscheint hier unter dem Parallax-Hero.", "Crea una pagina en WordPress, asignala como tu portada y su contenido aparecera aqui bajo el hero parallax."),
    ("Latest stories", "Senaste inläggen", "Neueste Geschichten", "Ultimas historias"),
    ("Parallax pages", "Parallaxsidor", "Parallax-Seiten", "Paginas parallax"),
    ("Select pages in the theme settings and decide exactly how they should stack through the front page experience.", "Välj sidor i temainställningarna och bestäm exakt hur de ska staplas genom startsidans upplevelse.", "Wählen Sie Seiten in den Theme-Einstellungen und legen Sie genau fest, wie sie im Startseitenerlebnis angeordnet werden.", "Selecciona paginas en los ajustes del tema y decide exactamente como deben apilarse en la experiencia de la portada."),
    ("Open page", "Öppna sida", "Seite öffnen", "Abrir pagina"),
    ("Give the scroll a destination.", "Ge scrollandet ett mål.", "Geben Sie dem Scrollen ein Ziel.", "Dale un destino al desplazamiento."),
    ("Use this closing section for contact, bookings, launch messaging, or a single strong call to action.", "Använd denna avslutande sektion för kontakt, bokningar, lanseringsbudskap eller en enda stark call to action.", "Nutzen Sie diesen Abschlussbereich für Kontakt, Buchungen, Launch-Kommunikation oder einen einzelnen starken Call-to-Action.", "Usa esta seccion final para contacto, reservas, mensajes de lanzamiento o una sola llamada a la accion potente."),
    ("Start a project", "Starta ett projekt", "Ein Projekt starten", "Iniciar un proyecto"),
    ("Parallax-ready, responsive, and customizable.", "Klar för parallax, responsiv och anpassningsbar.", "Bereit für Parallax, responsiv und anpassbar.", "Preparado para parallax, adaptable y personalizable."),
    ("Primary Menu", "Primär meny", "Primäres Menü", "Menu principal"),
    ("Image left", "Bild vänster", "Bild links", "Imagen a la izquierda"),
    ("Image right", "Bild höger", "Bild rechts", "Imagen a la derecha"),
    ("Stacked", "Staplad", "Gestapelt", "Apilado"),
    ("Compact", "Kompakt", "Kompakt", "Compacto"),
    ("Cards", "Kort", "Karten", "Tarjetas"),
    ("Full content", "Fullt innehåll", "Vollständiger Inhalt", "Contenido completo"),
    ("Parallax flow", "Parallaxflöde", "Parallax-Fluss", "Flujo parallax"),
    ("Gradient", "Gradient", "Verlauf", "Degradado"),
    ("Solid color", "Enfärgad", "Einzelfarbe", "Color solido"),
    ("Slot %d", "Plats %d", "Slot %d", "Espacio %d"),
    ("No page selected", "Ingen sida vald", "Keine Seite ausgewählt", "No se ha seleccionado ninguna pagina"),
    ("Click to edit", "Klicka för att redigera", "Klicken zum Bearbeiten", "Haz clic para editar"),
    ("Support Theme", "Stöd temat", "Theme unterstützen", "Apoyar el tema"),
    ("Home", "Hem", "Startseite", "Inicio"),
    ("Blog", "Blogg", "Blog", "Blog"),
    ("Support Jarl Parallax", "Stöd Jarl Parallax", "Jarl Parallax unterstützen", "Apoyar Jarl Parallax"),
    ("Who is behind this?", "Vem ligger bakom detta?", "Wer steckt dahinter?", "¿Quien esta detras de esto?"),
    ("This theme was built by Charlie Jarl in his spare time.", "Detta tema byggdes av Charlie Jarl på fritiden.", "Dieses Theme wurde von Charlie Jarl in seiner Freizeit entwickelt.", "Este tema fue creado por Charlie Jarl en su tiempo libre."),
    ("If you think it is good, say it out loud. Share it. Use it.", "Tycker du att det är bra, säg det högt. Dela det. Använd det.", "Wenn Sie es gut finden, sagen Sie es laut. Teilen Sie es. Nutzen Sie es.", "Si te parece bueno, dilo en voz alta. Compartelo. Usalo."),
    ("The theme is free for a reason: good things should not be hidden behind paywalls.", "Temat är gratis av en anledning: bra saker ska inte gömmas bakom betalväggar.", "Das Theme ist aus gutem Grund kostenlos: Gute Dinge sollten nicht hinter Paywalls versteckt werden.", "El tema es gratis por una razon: las cosas buenas no deberian esconderse tras muros de pago."),
    ("But if you want to show real appreciation, a donation is hugely appreciated.", "Men om du vill visa verklig uppskattning så uppskattas en donation enormt.", "Wenn Sie echte Wertschätzung zeigen möchten, freuen wir uns sehr über eine Spende.", "Pero si quieres mostrar un agradecimiento real, una donacion se agradece enormemente."),
    ("Completely optional. Entirely up to you.", "Helt frivilligt. Helt upp till dig.", "Vollkommen freiwillig. Ganz Ihnen überlassen.", "Completamente opcional. Depende totalmente de ti."),
    ("Scan the PayPal code if you want, and pay whatever you think it is worth.", "Skanna PayPal-koden om du vill och betala det du tycker att det är värt.", "Scannen Sie den PayPal-Code, wenn Sie möchten, und zahlen Sie, was Sie für angemessen halten.", "Escanea el codigo de PayPal si quieres y paga lo que creas que vale."),
    ("The QR code could not be found in the theme.", "QR-koden kunde inte hittas i temat.", "Der QR-Code konnte im Theme nicht gefunden werden.", "No se pudo encontrar el codigo QR en el tema."),
    ("PayPal QR code for donations", "PayPal QR-kod för donationer", "PayPal-QR-Code für Spenden", "Codigo QR de PayPal para donaciones"),
    ("Menu", "Meny", "Menü", "Menu"),
    ("Primary menu", "Primär meny", "Primäres Menü", "Menu principal"),
    ("Nothing published yet.", "Inget publicerat ännu.", "Noch nichts veröffentlicht.", "Todavia no se ha publicado nada."),
    ("Create posts or pages and they will appear here.", "Skapa inlägg eller sidor så visas de här.", "Erstellen Sie Beiträge oder Seiten, dann erscheinen sie hier.", "Crea entradas o paginas y apareceran aqui."),
    ("Results for \"%s\"", "Resultat för \"%s\"", "Ergebnisse für \"%s\"", "Resultados para \"%s\""),
    ("Search", "Sök", "Suche", "Buscar"),
    ("Refine the search or browse the matching content below.", "Förfina sökningen eller bläddra bland det matchande innehållet nedan.", "Verfeinern Sie die Suche oder durchsuchen Sie die passenden Inhalte unten.", "Refina la busqueda o explora el contenido coincidente a continuacion."),
    ("No matches found.", "Inga träffar hittades.", "Keine Treffer gefunden.", "No se encontraron coincidencias."),
    ("Try a broader phrase, a shorter keyword, or browse the site manually.", "Prova en bredare fras, ett kortare sökord eller bläddra manuellt på sajten.", "Versuchen Sie einen allgemeineren Ausdruck, ein kürzeres Stichwort oder durchsuchen Sie die Website manuell.", "Prueba una frase mas amplia, una palabra clave mas corta o navega por el sitio manualmente."),
    ("Search the site", "Sök på sajten", "Website durchsuchen", "Buscar en el sitio"),
    ("Search for:", "Sök efter:", "Suchen nach:", "Buscar:"),
    ("PLX Theme Options", "PLX Theme-inställningar", "PLX Theme-Optionen", "Opciones del tema PLX"),
    ("Hero", "Hero", "Hero", "Hero"),
    ("Eyebrow Text", "Överrubrik", "Vorspanntext", "Texto superior"),
    ("Hero Title", "Hero-rubrik", "Hero-Titel", "Titulo del hero"),
    ("Hero Text", "Hero-text", "Hero-Text", "Texto del hero"),
    ("Primary Button Text", "Primär knapptext", "Text der primären Schaltfläche", "Texto del boton principal"),
    ("Primary Button URL", "Primär knapp-URL", "URL der primären Schaltfläche", "URL del boton principal"),
    ("Secondary Button Text", "Sekundär knapptext", "Text der sekundären Schaltfläche", "Texto del boton secundario"),
    ("Secondary Button URL", "Sekundär knapp-URL", "URL der sekundären Schaltfläche", "URL del boton secundario"),
    ("Hero Background Image", "Hero-bakgrundsbild", "Hero-Hintergrundbild", "Imagen de fondo del hero"),
    ("Intro Panel Image", "Intro-panelbild", "Intro-Panelbild", "Imagen del panel de introduccion"),
    ("Profile & Stats", "Profil och statistik", "Profil und Statistiken", "Perfil y estadisticas"),
    ("Intro Section", "Introsektion", "Einleitungsbereich", "Seccion de introduccion"),
    ("Parallax Pages", "Parallaxsidor", "Parallax-Seiten", "Paginas parallax"),
    ("Recent Posts", "Senaste inlägg", "Neueste Beiträge", "Entradas recientes"),
    ("CTA Section", "CTA-sektion", "CTA-Bereich", "Seccion CTA"),
    ("Footer", "Sidfot", "Footer", "Pie de pagina"),
    ("Profile Card Title", "Profilkortets titel", "Titel der Profilkarte", "Titulo de la tarjeta de perfil"),
    ("Stat %d Title", "Statistik %d titel", "Statistik %d Titel", "Titulo de la estadistica %d"),
    ("Stat %d Text", "Statistik %d text", "Statistik %d Text", "Texto de la estadistica %d"),
    ("Show Intro Section", "Visa introsektion", "Einleitungsbereich anzeigen", "Mostrar seccion de introduccion"),
    ("Intro Title", "Introtitel", "Einleitungstitel", "Titulo de introduccion"),
    ("Intro Text", "Introtext", "Einleitungstext", "Texto de introduccion"),
    ("Feature %d Title", "Funktion %d titel", "Feature-%d-Titel", "Titulo de la funcion %d"),
    ("Feature %d Text", "Funktion %d text", "Feature-%d-Text", "Texto de la funcion %d"),
    ("Empty Content Title", "Titel för tomt innehåll", "Titel für leeren Inhalt", "Titulo del contenido vacio"),
    ("Empty Content Text", "Text för tomt innehåll", "Text für leeren Inhalt", "Texto del contenido vacio"),
    ("Show Recent Posts Section", "Visa sektionen Senaste inlägg", "Bereich Neueste Beiträge anzeigen", "Mostrar seccion de entradas recientes"),
    ("Recent Posts Title", "Titel för senaste inlägg", "Titel der neuesten Beiträge", "Titulo de entradas recientes"),
    ("Recent Posts Count", "Antal senaste inlägg", "Anzahl neuester Beiträge", "Cantidad de entradas recientes"),
    ("Footer Tagline", "Sidfotens tagline", "Footer-Slogan", "Eslogan del pie de pagina"),
    ("Show Parallax Pages Section", "Visa sektionen Parallaxsidor", "Bereich Parallax-Seiten anzeigen", "Mostrar seccion de paginas parallax"),
    ("Parallax Pages Title", "Titel för Parallaxsidor", "Titel der Parallax-Seiten", "Titulo de paginas parallax"),
    ("Parallax Pages Text", "Text för Parallaxsidor", "Text der Parallax-Seiten", "Texto de paginas parallax"),
    ("Parallax Pages Button Text", "Knapptext för Parallaxsidor", "Schaltflächentext für Parallax-Seiten", "Texto del boton de paginas parallax"),
    ("Parallax Pages Display", "Visning för Parallaxsidor", "Anzeige für Parallax-Seiten", "Vista de paginas parallax"),
    ("Choose between summary cards, full content panels, or full-width parallax flow sections in the chosen order.", "Välj mellan sammanfattningskort, paneler med fullt innehåll eller sektioner i full bredd med parallaxflöde i vald ordning.", "Wählen Sie zwischen Zusammenfassungskarten, Panels mit vollständigem Inhalt oder vollbreiten Parallax-Flow-Bereichen in der gewählten Reihenfolge.", "Elige entre tarjetas de resumen, paneles de contenido completo o secciones de flujo parallax a todo el ancho en el orden elegido."),
    ("Parallax Page Order", "Ordning för Parallaxsidor", "Reihenfolge der Parallax-Seiten", "Orden de paginas parallax"),
    ("Drag slots to change the page order on the front page.", "Dra slots för att ändra sidornas ordning på startsidan.", "Ziehen Sie Slots, um die Reihenfolge der Seiten auf der Startseite zu ändern.", "Arrastra los espacios para cambiar el orden de las paginas en la portada."),
    ("Page Slot %d", "Sidslot %d", "Seitenslot %d", "Espacio de pagina %d"),
    ("Page Slot %d Layout", "Layout för sidslot %d", "Layout für Seitenslot %d", "Diseño del espacio de pagina %d"),
    ("Page Slot %d Background Base", "Bakgrundsbas för sidslot %d", "Hintergrundbasis für Seitenslot %d", "Base de fondo del espacio de pagina %d"),
    ("Choose whether the panel background starts from a gradient or a single color. You can also place an image on top with opacity below.", "Välj om panelens bakgrund ska börja med en gradient eller en enfärg. Du kan också lägga en bild ovanpå med opacitet nedan.", "Wählen Sie, ob der Panel-Hintergrund mit einem Verlauf oder einer Einzelfarbe beginnt. Sie können auch ein Bild darüber mit untenstehender Deckkraft platzieren.", "Elige si el fondo del panel parte de un degradado o de un solo color. Tambien puedes colocar una imagen encima con la opacidad indicada abajo."),
    ("Page Slot %d Gradient Color 1", "Sidslot %d gradientfärg 1", "Seitenslot %d Verlaufsfarbe 1", "Color 1 del degradado del espacio de pagina %d"),
    ("Page Slot %d Gradient Color 2", "Sidslot %d gradientfärg 2", "Seitenslot %d Verlaufsfarbe 2", "Color 2 del degradado del espacio de pagina %d"),
    ("Page Slot %d Solid Background Color", "Sidslot %d enfärgad bakgrund", "Seitenslot %d Hintergrundfarbe", "Color de fondo solido del espacio de pagina %d"),
    ("Page Slot %d Background Image", "Sidslot %d bakgrundsbild", "Seitenslot %d Hintergrundbild", "Imagen de fondo del espacio de pagina %d"),
    ("Optional image overlay for the panel background.", "Valfri bildöverlagring för panelbakgrunden.", "Optionales Bild-Overlay für den Panel-Hintergrund.", "Superposicion de imagen opcional para el fondo del panel."),
    ("Page Slot %d Background Image Opacity", "Sidslot %d bakgrundsbildens opacitet", "Deckkraft des Hintergrundbilds für Seitenslot %d", "Opacidad de la imagen de fondo del espacio de pagina %d"),
    ("Show CTA Section", "Visa CTA-sektion", "CTA-Bereich anzeigen", "Mostrar seccion CTA"),
    ("CTA Title", "CTA-rubrik", "CTA-Titel", "Titulo CTA"),
    ("CTA Text", "CTA-text", "CTA-Text", "Texto CTA"),
    ("CTA Button Text", "CTA-knapptext", "CTA-Schaltflächentext", "Texto del boton CTA"),
    ("CTA Button URL", "CTA-knapp-URL", "CTA-Schaltflächen-URL", "URL del boton CTA"),
    ("Appearance", "Utseende", "Erscheinungsbild", "Apariencia"),
    ("Color Mode", "Färgläge", "Farbmodus", "Modo de color"),
    ("Light", "Ljust", "Hell", "Claro"),
    ("Auto", "Auto", "Auto", "Automatico"),
    ("Dark", "Mörkt", "Dunkel", "Oscuro"),
    ("Primary Color", "Primär färg", "Primärfarbe", "Color principal"),
    ("Accent Color", "Accentfärg", "Akzentfarbe", "Color de acento"),
    ("Surface Color", "Ytfärg", "Flächenfarbe", "Color de superficie"),
    ("Text Color", "Textfärg", "Textfarbe", "Color del texto"),
    ("Inverse Text Color", "Inverterad textfärg", "Invertierte Textfarbe", "Color de texto invertido"),
    ("Gradient Color 1", "Gradientfärg 1", "Verlaufsfarbe 1", "Color 1 del degradado"),
    ("Gradient Color 2", "Gradientfärg 2", "Verlaufsfarbe 2", "Color 2 del degradado"),
    ("Gradient Color 3", "Gradientfärg 3", "Verlaufsfarbe 3", "Color 3 del degradado"),
    ("Dark Mode Colors", "Mörka färger", "Farben für den Dunkelmodus", "Colores del modo oscuro"),
    ("Dark Primary Color", "Mörk primär färg", "Dunkle Primärfarbe", "Color principal oscuro"),
    ("Dark Accent Color", "Mörk accentfärg", "Dunkle Akzentfarbe", "Color de acento oscuro"),
    ("Dark Surface Color", "Mörk ytfärg", "Dunkle Flächenfarbe", "Color de superficie oscuro"),
    ("Dark Text Color", "Mörk textfärg", "Dunkle Textfarbe", "Color de texto oscuro"),
    ("Dark Inverse Text Color", "Mörk inverterad textfärg", "Dunkle invertierte Textfarbe", "Color de texto invertido oscuro"),
    ("Dark Gradient Color 1", "Mörk gradientfärg 1", "Dunkle Verlaufsfarbe 1", "Color 1 del degradado oscuro"),
    ("Dark Gradient Color 2", "Mörk gradientfärg 2", "Dunkle Verlaufsfarbe 2", "Color 2 del degradado oscuro"),
    ("Dark Gradient Color 3", "Mörk gradientfärg 3", "Dunkle Verlaufsfarbe 3", "Color 3 del degradado oscuro"),
    ("Dark Hero Overlay Opacity", "Opacitet för mörk hero-overlay", "Deckkraft des dunklen Hero-Overlays", "Opacidad de la superposicion oscura del hero"),
    ("Google Font", "Google-typsnitt", "Google-Schriftart", "Fuente de Google"),
    ("Gradient Angle", "Gradientvinkel", "Verlaufswinkel", "Angulo del degradado"),
    ("Hero Overlay Opacity", "Hero-overlayens opacitet", "Deckkraft des Hero-Overlays", "Opacidad de la superposicion del hero"),
    ("Behavior", "Beteende", "Verhalten", "Comportamiento"),
    ("Enable Parallax", "Aktivera parallax", "Parallax aktivieren", "Activar parallax"),
    ("Disable Parallax on Mobile", "Inaktivera parallax på mobil", "Parallax auf Mobilgeräten deaktivieren", "Desactivar parallax en movil"),
    ("Sticky Header", "Klistrad header", "Sticky Header", "Cabecera fija"),
    ("Smooth Scroll", "Mjuk scroll", "Sanftes Scrollen", "Desplazamiento suave"),
    ("Parallax Speed", "Parallaxhastighet", "Parallax-Geschwindigkeit", "Velocidad de parallax"),
    ("Content Width", "Innehållsbredd", "Inhaltsbreite", "Ancho del contenido"),
]

LOCALES = {
    "sv_SE": {
        "language_name": "Swedish",
        "team": "Swedish",
        "index": 1,
    },
    "de_DE": {
        "language_name": "German",
        "team": "German",
        "index": 2,
    },
    "es_ES": {
        "language_name": "Spanish",
        "team": "Spanish",
        "index": 3,
    },
}


def escape_po(value: str) -> str:
    return value.replace("\\", "\\\\").replace('"', '\\"').replace("\n", "\\n")


def parse_pot_messages(path: Path) -> list[str]:
    msgids: list[str] = []
    for line in path.read_text(encoding="utf-8").splitlines():
        if line.startswith('msgid "') and line != 'msgid ""':
            msgids.append(line[7:-1].encode("utf-8").decode("unicode_escape"))
    return msgids


def build_catalog(locale: str) -> dict[str, str]:
    index = LOCALES[locale]["index"]
    translations = {entry[0]: entry[index] for entry in MESSAGES}
    missing = [msgid for msgid in parse_pot_messages(POT_PATH) if msgid not in translations]
    if missing:
        raise SystemExit(f"Missing translations for {locale}: {missing}")
    return translations


def write_po(locale: str, catalog: dict[str, str]) -> None:
    meta = LOCALES[locale]
    header = "\n".join(
        [
            f"Project-Id-Version: Jarl Parallax\\n",
            "Report-Msgid-Bugs-To: \\n",
            "POT-Creation-Date: 2026-04-08 11:49+0000\\n",
            "PO-Revision-Date: 2026-04-08 12:30+0000\\n",
            "Last-Translator: Charlie Jarl\\n",
            f"Language-Team: {meta['team']}\\n",
            f"Language: {locale}\\n",
            "MIME-Version: 1.0\\n",
            "Content-Type: text/plain; charset=UTF-8\\n",
            "Content-Transfer-Encoding: 8bit\\n",
            "Plural-Forms: nplurals=2; plural=(n != 1);\\n",
            "X-Generator: Codex\\n",
        ]
    )

    lines = ['msgid ""', 'msgstr ""']
    for part in header.splitlines():
        lines.append(f'"{part}"')
    lines.append("")

    for msgid in parse_pot_messages(POT_PATH):
        msgstr = catalog[msgid]
        lines.append(f'msgid "{escape_po(msgid)}"')
        lines.append(f'msgstr "{escape_po(msgstr)}"')
        lines.append("")

    (LANG_DIR / f"{DOMAIN}-{locale}.po").write_text("\n".join(lines), encoding="utf-8", newline="\n")


def write_mo(locale: str, catalog: dict[str, str]) -> None:
    messages = {"": ""} | catalog
    keys = sorted(messages.keys())
    ids = [key.encode("utf-8") for key in keys]
    strs = [messages[key].encode("utf-8") for key in keys]

    keystart = 7 * 4
    id_table_offset = keystart
    str_table_offset = id_table_offset + len(keys) * 8
    ids_offset = str_table_offset + len(keys) * 8
    strs_offset = ids_offset + sum(len(item) + 1 for item in ids)

    id_entries = []
    offset = ids_offset
    for item in ids:
        id_entries.append((len(item), offset))
        offset += len(item) + 1

    str_entries = []
    offset = strs_offset
    for item in strs:
        str_entries.append((len(item), offset))
        offset += len(item) + 1

    output = bytearray()
    output.extend(struct.pack("Iiiiiii", 0x950412de, 0, len(keys), id_table_offset, str_table_offset, 0, 0))
    for length, offset in id_entries:
        output.extend(struct.pack("ii", length, offset))
    for length, offset in str_entries:
        output.extend(struct.pack("ii", length, offset))
    for item in ids:
        output.extend(item + b"\x00")
    for item in strs:
        output.extend(item + b"\x00")

    header = (
        f"Project-Id-Version: Jarl Parallax\n"
        f"Language: {locale}\n"
        "MIME-Version: 1.0\n"
        "Content-Type: text/plain; charset=UTF-8\n"
        "Content-Transfer-Encoding: 8bit\n"
        "Plural-Forms: nplurals=2; plural=(n != 1);\n"
        "X-Generator: Codex\n"
    ).encode("utf-8")

    empty_len, empty_offset = str_entries[0]
    output[empty_offset:empty_offset + empty_len] = header

    (LANG_DIR / f"{DOMAIN}-{locale}.mo").write_bytes(output)


def main() -> None:
    for locale in LOCALES:
        catalog = build_catalog(locale)
        write_po(locale, catalog)
        write_mo(locale, catalog)
        print(f"Generated {DOMAIN}-{locale}.po/.mo")


if __name__ == "__main__":
    main()
