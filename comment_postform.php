<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
</head>
<body>

									<!-- comment post form -->
								    <!-- TODO PHP: Kommentarsfält ska valideras med hjälp av regex. Primärt e-postadressen, dvs. kommentaren ska inte sättas in i databasen om man inte har skrivit en korrekt utformad e-postadress. -->
                                    <!-- ATTN CSS: Det är en tillgänglighets-rekommendation att formulär ska ha ett slags standardutseende, för igenkänning. -->
                                    <!-- Hur skyddar man att någon inte lägger in saker i databasen genom formulärfälten? -->

								    <em>Fyll i alla fält och klicka sedan på knappen "Publicera" under fälten.<br>
                                    Din kommentar kommer då att placeras bland övriga kommentarer.</em>
								    <br>
                                    <br>
								    <form method="post" action=""> <!-- TODO PHP: action: mellan citationstecknen: Lägg in så att vid klick på Publicera-knappen så publiceras texten under "Läs kommentarer" och förslag: automatiskt blir "Visa alla inlägg" aktivt på samma sida (för att man ska se var ens egen kommentar hamnar). Kommentarsfälten ska då åter bli nollställda. Likaså ska det läggas in en publiceringstidpunkt ovanför kommentaren. --> 
								        <label for="comment_author">Ditt förnamn och efternamn:</label>  <!-- TODO CSS: aningen mer luft mellan formulärnamn och formulärfält (4 ställen) -->
                                        <br>
								        <input type="text" name="firstname and lastname" id="comment_author" placeholder="Förnamn Efternamn" autocomplete required />
                                        <br>
								        <br>
                                        <label for="comment_email">Din e-postadress:</label>
                                        <br>
								        <input type="email" name="email" id="comment_email" placeholder="exempel@domain.se" autocomplete required>
                                        <br>
								        <br>
                                        <label for="comment_website">Din webbadress:</label>
                                        <br>
								        <input type="url" name="website" id="comment_website" placeholder="http://minsajt.se" autocomplete required><br>  <!-- Finns det ngt som gör att http:// eller https:// inte behöver skrivas av användaren? -->
								        <br>
								        <br>
                                        <label for="comment_content">Din kommentar:</label>
                                        <br>
								        <textarea name="comment" id="comment_content" placeholder="Skriv din kommentar här." rows="5" cols="40" required></textarea>
                                        <br>
								        <br>
								        <input type="submit" value="Publicera">
								    </form>
									<!-- #END form -->



</body>
</html>