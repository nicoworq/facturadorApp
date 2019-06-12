<h4 class="uk-heading-line uk-text-bold"><span>Datos Factura</span></h4>

<form action="facturador.php" method="POST">

    <fieldset class="uk-fieldset">

        <div class="uk-margin">
            <label class="uk-form-label" for="form-stacked-select">Tipo de Comprobante:</label>
            <div class="uk-form-controls">
                <select class="uk-select" name="CbteTipo">
                    <option value='11' selected="selected">Factura C</option>
                </select>
            </div>
        </div>
        <div class="uk-margin">
            <label class="uk-form-label" for="form-stacked-select">Concepto:</label>
            <div class="uk-form-controls">
                <select class="uk-select" name="Concepto">
                    <option value='1' selected="selected">Productos</option>
                    <option value='2'>Servicios</option>
                    <option value='3'>Productos y Servicios</option>
                </select>
            </div>
        </div>
        <div class="uk-margin">
            <label class="uk-form-label" for="form-stacked-select">Tipo documento :</label>
            <div class="uk-form-controls">
                <select class="uk-select" name="DocTipo">
                    <option value='80' selected="selected">CUIT</option>
                </select>
            </div>
        </div>

        <div class="uk-margin">
            <label class="uk-form-label" for="form-stacked-select">Nro documento:</label>
            <div class="uk-form-controls">
                <input type="number" class="uk-input" name="DocNro" value="30709645486"/>

            </div>
        </div>
        <div class="uk-margin">
            <label class="uk-form-label" for="form-stacked-select">Importe Total:</label>
            <div class="uk-form-controls">
                <input type="number" class="uk-input" name="ImpTotal"/>
            </div>
        </div>


    </fieldset>

    <button class="uk-button uk-button-default">Crear factura</button>
</form>