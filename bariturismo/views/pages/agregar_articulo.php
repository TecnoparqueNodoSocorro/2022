<div class="divPublicaciones container-fluid mt-4  mb-5 pb-5">


    <div class="row pt-5 ">
        <div class="col-12 col-md-6 my-3">

            <select class="form-select" aria-label="Default select example" id="municipio">
                <option selected value="0">--Seleccione el municipio--</option>
                <option value="barichara">Barichara</option>
                <option value="villanueva">Villanueva</option>
            </select>

        </div>

        <div class="col-12 col-md-6 my-3">

            <select class="form-select" aria-label="Default select example" id="sesion">
                <option selected value="0">--Seleccione la categoria--</option>
                <option value="historia">Historia</option>
                <option value="turismo">Turismo</option>
                <option value="restaurantes">Restaurantes</option>
                <option value="hospedajes">Hospedajes</option>
                <option value="generales">Generales</option>
            </select>

        </div>

    </div>



    <div class="row">
        <div class="col-12 my-2 col-md-12" id="nombre_div">
            <div class="input-group mb-3 ">
                <span class="input-group-text" id="basic-addon1"><i class="bi bi-file-earmark-font-fill"></i></span>
                <input type="text" class="form-control" placeholder="Nombre" aria-label="Nombre" aria-describedby="basic-addon1" id="nombre_art">
            </div>
        </div>

        <div class="col-12 my-2 col-md-12" id="direccion_div">
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1"><i class="bi bi-signpost"></i></span>
                <input type="text" class="form-control" placeholder="Dirección" aria-label="Dirección" aria-describedby="basic-addon1" id="direccion_art">
            </div>
        </div>

        <div class="col-12 my-2  " id="coordenadas_div">
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1"><i class="bi bi-geo-alt"></i></span>
                <input type="text" class="form-control form-control-sm" placeholder="Coordenadas X" aria-label="Coordenadas" aria-describedby="basic-addon1" id="coordenadas_x_art">
                <hr>

                <input type="text" class="form-control form-control-sm" placeholder="Coordenadas Y" aria-label="Coordenadas" aria-describedby="basic-addon1" id="coordenadas_y_art">

            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12 my-2" id="descripcion_div">
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1"><i class="bi bi-card-heading"></i></span>
                <textarea type="text" class="form-control" placeholder="Descripción" aria-label="Descripción" aria-describedby="basic-addon1" id="descripcion_art"></textarea>
            </div>
        </div>

        <div class="col-12  col-md-6  my-2" id="facebook_div">
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1"><i class="bi bi-facebook"></i></span>
                <input type="text" class="form-control" placeholder="Facebook" aria-label="Facebook" aria-describedby="basic-addon1" id="facebook_art">
            </div>
        </div>

        <div class="col-12  col-md-6  my-2" id="instagram_div">
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1"><i class="bi bi-instagram"></i></span>
                <input type="text" class="form-control" placeholder="Instagram" aria-label="Instagram" aria-describedby="basic-addon1" id="instagram_art">
            </div>
        </div>
    </div>

    <div class="row" id="imagenes_div">

        <div class="col-12 col-md-6  my-2">
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1"><i class="bi bi-file-image-fill"></i></span>
                <input type="file" class="form-control" id="img1_art">
            </div>
        </div>

        <div class="col-12 col-md-6  my-2">
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1"><i class="bi bi-file-image-fill"></i></span>
                <input type="file" class="form-control" id="img2_art">
            </div>
        </div>



    </div>
    <div class="row mb-5">
        <div class="col-12 my-2" style="text-align: center;">
            <a type="button" href="index.php?page=publicaciones" class="btn btn-danger">Volver</a>
            <button type="button" id="btn_guardar_art" class="btn btn-primary">Guardar</button>
        </div>
    </div>

</div>