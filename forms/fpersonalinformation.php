
<div style="margin-top:3%">
<fieldset><legend>Henkilötietojen muokkaus</legend>
<form method="post">
  <p>
  Ikä
  <br />  <input type="text" name="givenAge" placeholder="ikä numeroina" maxlength="40" required/>
  </p><p>
  Sukupuoli
  <br /> <select name="givenGender">
  <option value="Mies">Mies</option>
  <option value="Nainen">Nainen</option>
  <option value="Muu">Muu</option>
        </select required>
  </p><p>
  Pituus
  <br />  <input type="text" name="givenHeight" placeholder="  " maxlength="40"/>
  </p><p>
  Paino
  
  <br />  <input type="text" name="givenWeight" placeholder="  " maxlength="40"/>
  </p><p>
  Kuinka stressaantunut olet? 
  <br />  <input type="text" name="givenStress" placeholder="arvioi numeroina 1-10 " maxlength="40"/>
  </p><p>
  Taustaa meditaatiosta
  <br /> <select name="givenMeditation">
  <option value="Kyllä">Kyllä</option>
  <option value="Ei">Ei</option>
        </select>
  </p><p>
  Yleiskunto
  <br />  <input type="text" name="givenCondition" placeholder="esim. hyvä, perus ja huono  " maxlength="40"/>
  </p><p>
  <br />  <input type="submit" name="submitUser" value="Hyväksy"/>
          <input type="reset"  value="Tyhjennä"/>
          <input type="submit" name="submitBack" value="Palaa myöhemmin"/>
  </p>
</form>
</fieldset>
</div>
