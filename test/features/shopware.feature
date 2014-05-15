Feature: Complete checkout in Shopware

    @javascript
    Scenario: Proceed a succesful checkout
        Given I am on "/"
         Then I should see "Sommerwelten"
         
         When I follow "Sommerwelten"
         Then I should see "Strohhut mit UV Schutz"
         
         When I follow "Strohhut mit UV Schutz"
         Then I should see "SW10158"

         When I press "In den Warenkorb"
         Then I should see "Der Artikel wurde erfolgreich in den Warenkorb gelegt"

         When I follow "Warenkorb anzeigen"
         Then I should see "Ihr Warenkorb"

         When I follow "Zur Kasse gehen"
         Then I should see "Eine Online-Bestellung ist einfach"

         When I check "Kein Kundenkonto erstellen"
          And I press "Weiter"
         Then I should see "Ihre persönlichen Angaben"

         When I fill in "Vorname" with "Batman"
          And I fill in "Nachname" with "bin Superman"
          And I fill in "eMail-Adresse" with "batman@example.com"
          And I fill in "Telefon" with "01234/567890"
          And I fill in "street" with "Marvelstr."
          And I fill in "streetnumber" with "23"
          And I fill in "zipcode" with "12345"
          And I fill in "city" with "Universe"
          And I press "Registrierung abschließen"
         Then I should see "AGB und Widerrufsbelehrung"

         When I check "sAGB"
          And I press "Zahlungspflichtig bestellen"
         Then I should see "Vielen Dank für Ihre Bestellung"

