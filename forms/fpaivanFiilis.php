<fieldset><legend>Päivän Fiili</legend>
          <form method="post">
            <p>
            Päivän fiilis 
            <br />  <label for="fiilis">Päivän Fiilis (min 1 max 10):</label>
               <input type="number" id="fiilis" name="fiilis" min="1" max="Salasana 10">
            </p><p>

              <label for="kahvi">Kuinka monta kuppia joit kahvia (between 0 and 10):</label>
              <input type="range" id="kahvi" name="kahvi" min="0" max="10" step="1">
            </p><p>

              <label for="alkoholi">Kuinka monta annosta alkoholia nautit (between 0 and 15):</label>
              <input type="range" id="alkoholi" name="alkoholi" min="0" max="15" step="1">
            </p><p>
            
              <label for="nukkumaan">Milloin menit nukkumaan:</label>
              <input type="time" id="nukkumaan" name="nukkumaan">

            </p><p>

              <label for="heratys">Milloin heräsit:</label>
              <input type="time" id="heratys" name="heratys">

            </p><p>
            <br />  <input type="submit" name="submitFiilis" value="Hyväksy"/>
                    <input type="reset"  value="Tyhjennä"/>
            </p>
          </form>
       </fieldset>