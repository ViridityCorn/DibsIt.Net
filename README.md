# ComputarumBooking - Teknisk Dokument
Computarum Booking (fremover “produkt”) er et IT system, der kan bruges til, at booke lokaler, maskiner osv (fremover “materialer”).

Formålet med produktet er, at løse eventuelle vanskeligheder som diverse firmaer kan have, ved bookning af materialer. Disse vanskeligheder kan f.eks. være, at firmaet i forvejen ikke har et system til booking, at det er tidskrævende for ansatte at booke lokaler eller at der ofte er flere, der booker det samme på samme tid.

Produktet vil desuden være meget intuitivt, hvilket gør, at brugerne hurtigt vil føle sig komfortable med det. Derudover kan produktet let tilpasses de problemer, det står overfor, således at det kan bruges til næsten enhver situation.

## Hvad kan Computarum Booking?
Produktet er først og fremmest et bookingsystem designet til at kunne booke materialer.
Derudover har det indbygget understøttelse for et hierarki-system, således at nogle brugere har højere prioritet, og derfor kan “overbooke” et allerede booket materiale.

Produktet kan desuden tilpasses og skaléres til enhver booking-situation, så at det præcist opnår kundens behov.

### Hierarki
Produktet har den funktion, at det understøtter implementationen af et hierarki. Dvs. at visse personer kan overbooke materialer, hvis de har rettighederne til det.
Et eksempel på dette er, hvis produktet bruges til lokalebooking på et gymnasie. Her kan det implementeres, at lærere altid kan overbooke elever, og at 3.g’ere kan overbooke 2. og 3.g’ere i eksamensperioder.

Dette koncept kan tilpasses, så det passer til kundens behov, og løser de problematikker, som kunde måtte have.

### Skalérbart
Produktet er skalèrbart, dvs. at det kan tilpasses forskellige situationer, så kunderne får mest muligt ud af det. Produktet vil have samme overflade, men der vil være mulighed for at ændre i hvilke materialer som kan bookes, samt hvordan hierarkiet hænger sammen. Derudover kan produktet udvides, så det er muligt at booke forskellige materialer, for det pågældende sted. 

### Intuitivt interface
Produktet har et meget intuitivt interface, der gør det nemt at navigere mellem forskellige funktioner. Vi mener, at dette er en vigtig del af produktet, da alle skal kunne bruge programmet uden at bruge lang tid på at lære det.

#### Brugerside
Brugersiden af produktet af bygget op af forskellige “moduler”.
Disse moduler gør alle noget forskelligt, og arbejder sammen om at give brugeren den bedste oplevelse.

##### Kategori og sortering
I venstre side af brugerinterfacet findes listen over kategorier og materialer. 
Listen er altid synlig, og har alle de materialer, som kan bookes.
Materialerne er opdelt efter kategorier, som administratoren har defineret, hvilket giver produktet evnen til præcist at ramme kundens behov.

Ydermere er der en “sorterings-knap”.
Denne knap gør det muligt at sortere i kategorierne og materialerne med lethed. Man kan sortere alt efter hvilken type materiale, der er snak om, hvor mange man skal være om at booke materialet eller om hvornår materialet skal være ledigt.
Dette muliggør, at man hurtigt kan finde, hvad man skal bruge uden at kigge på alle de individuelle materialers skema.

##### Skema
I midten af brugerinterfacet er der placeret et skema. Dette skema viser en uge af gangen, og man kan let se næste ugers skemaer og de forrige ugers skemaer ved hjælp af knapperne ovenover skemaet.
Hver gang man vælger et materiale i listen i venstre side, vil materialets skema blive vist i midten. I skemaet kan man se, hvornår materialet er booket.

##### Bookingknap
I højre side af skærmen findes modulet til at foretage bookingen.
Her vælger brugeren datoen og tidsrummet, som brugeren gerne vil booke materialet i. Derudover kan brugeren også skrive en kort besked, der kommer til at stå på materialets skema ved siden af brugerens navn.

#### Administrationsside
På administrationssiden kan administratoren indstille mange parametre, der tilpasser produktet til kundens behov.

## Hvordan fungerer det?
### Login
### Backend
#### Elevdatabase
#### Lokale-database

## Computarum I/S
Senest ændret d. 14/11-2019