var datas;
$(document).ready(function () {
    selectAula();
    
    $("#programsuccess").hide();
    $("#programdanger").hide();

    //getAll_student();

    $("#user").keyup(function (e) {
        if ($("#user").val()) {
            let search = $("#user").val();
            $.ajax({
                url: "getUser",
                type: "POST",
                data: { search: search },
                dataType: "JSON",
                success: function (response) {
                    let templete = ``;
                    response.forEach((respon) => {
                        templete += `
                        <div class="list-group" id="show-list2">
 
                        <a href="#" id="item-data" class="list-group-item list-group-item-action border-1">${respon.nombre}</a>
                        <input type="hidden" id="idcedulas" value="${respon.cedula}">
                        </div>`;
                    });
                    $("#show-list").html(templete);
                },
            });
        } else {
            $("#show-list").html("");
        }
    });

    $(document).on("click", "#show-list2", function (e) {

        $("#cedula").val($(this).children('input').val());

        $("#show-list").html("");
    });

    $(document).on("click", "#item-data", function (e) {
        $("#nombre").val($(this).text());
        $("#user").val($(this).text());
    })

    $("#searchusuario").keyup(function (e) {
        if ($("#searchusuario").val()) {
            let search = $("#searchusuario").val();
            $.ajax({
                url: "estudiantes/get_searchUsuario",
                type: "POST",
                data: { search: search },
                dataType: "JSON",
                beforeSend: function (objeto) {
                    $("#loader1").html(
                        '<img src="Public/assets/icons/ajax-loader.gif"> '
                    );
                },
                success: function (response) {
                    let template = "";
                    response.forEach((respon) => {
                        template += `
                        <tr respon="${respon.cedula}"> 
                            <td>${respon.cedula}</td>
                            <td>${respon.nombre}</td>
                            <td>${respon.nombreprograma}</td>
                            <td class="text-center">${respon.semestre}</td>
                            <td>${respon.telefono}</td>
                             <td class="text-center">
                                <a href="estudiantes/editar/${respon.cedula}?view=true" class="btneye1 btn btn-primary border"><i class="fas fa-eye"></i></a>
                                <a href="estudiantes/editar/${respon.cedula}?edit=true" class="btnedit1 btn btn-info border"><i class="fas fa-edit"></i></a>
                                <button class="btndelet1 btn btn-danger border"><i class="fas fa-trash-alt"></i></i></button>
                             </td>
                        </tr>
                   `;
                    });
                    $(".tbody-student").html(template);
                    $("#loader1").html("");
                },
            });
        } else {
            getAll_student();
        }
    });

    $("#buscar_docente").keyup(function (e) {
        if ($("#buscar_docente").val()) {
            let search = $("#buscar_docente").val();
            $.ajax({
                url: "docentes/get_search_docente",
                type: "POST",
                data: { search: search },
                dataType: "JSON",
                beforeSend: function (objeto) {
                    $("#loader2").html(
                        '<img src="Public/assets/icons/ajax-loader.gif"> '
                    );
                },
                success: function (response) {
                    let template = "";
                    response.forEach((respon) => {
                        template += `
                        <tr respon="${respon.cedula}"> 
                        <td>${respon.cedula}</td>
                        <td>${respon.nombre_completo}</td>
                        <td>${respon.telefono}</td>
                        <td>${respon.tipo}</td>
                         <td class="text-center">
                            <button class="btn btn-primary border"><i class="fas fa-eye"></i></button>
                            <a href="docentes/editar/${respon.cedula}" class="btnedit btn btn-info border"><i class="fas fa-edit"></i></a>
                            <form action="docentes/delete/${respon.cedula}" method="post" style="display: inline">
                                <button type="submit" class="btn btn-danger"> <i class="fas fa-trash-alt"></i></button>
                            </form>
                         </td>
                        </tr>
                   `;
                    });
                    $("#tbodydocente").html(template);
                    $("#loader2").html("");
                },
            });
        } else {
            getAll_docente();
        }
    });

    $("#buscar_administrativo").keyup(function (e) {
        if ($("#buscar_administrativo").val()) {
            let search = $("#buscar_administrativo").val();
            $.ajax({
                url: "administrativos/get_search_administrativo",
                type: "POST",
                data: { search: search },
                dataType: "JSON",
                beforeSend: function (objeto) {
                    $("#loader3").html(
                        '<img src="Public/assets/icons/ajax-loader.gif"> '
                    );
                },
                success: function (response) {
                    let template = "";
                    response.forEach((respon) => {
                        template += `
                        <tr respon="${respon.cedula}"> 
                        <td>${respon.cedula}</td>
                        <td>${respon.nombre_completo}</td>
                        <td>${respon.telefono}</td>
                        <td>${respon.dependencia}</td>
                         <td class="text-center">
                            <button class="btn btn-primary border"><i class="fas fa-eye"></i></button>
                            <a href="docentes/editar/${respon.cedula}" class="btnedit btn btn-info border"><i class="fas fa-edit"></i></a>
                            <form action="docentes/delete/${respon.cedula}" method="post" style="display: inline">
                                <button type="submit" class="btn btn-danger"> <i class="fas fa-trash-alt"></i></button>
                            </form>
                         </td>
                        </tr>
                   `;
                    });
                    $("#tbodyadministrativo").html(template);
                    $("#loader3").html("");
                },
            });
        } else {
            getAll_administrativo();
        }
    });

    $("#buscar_administrador").keyup(function (e) {
        if ($("#buscar_administrador").val()) {
            let search = $("#buscar_administrador").val();
            $.ajax({
                url: "administradores/get_adminstradores",
                type: "POST",
                data: { search: search },
                dataType: "JSON",
                beforeSend: function (objeto) {
                    $("#loader3").html(
                        '<img src="Public/assets/icons/ajax-loader.gif"> '
                    );
                },
                success: function (response) {
                    console.log(response);
                    let template = "";
                    response.forEach((respon) => {
                        template += `
                            <tr respon="${respon.id}"> 
                                <td>${respon.cedula}</td>
                                <td>${respon.nombre}</td>
                                <td>${respon.tipo}</td>
                                <td>${respon.telefono}</td>
                                <td>${respon.correo}</td>
                                <td class="text-center">
                                <a href="administradores/show/${respon.id}"
                                    class="btn btn-primary border"><i class="fas fa-eye"></i></a>
                                <a href="administradores/editar/${respon.id}"
                                    class="btnedit btn btn-info border"><i class="fas fa-edit"></i></a>
                                <form action="administradores/delete/${respon.id}" method="post"
                                    style="display: inline">
                                    <button type="submit" class="btn btn-danger"> <i
                                            class="fas fa-trash-alt"></i></button>
                                </form>
                            </td>  
                            </tr>
                       `;
                    });
                    $("#tbodyadmins").html(template);
                    $("#loader3").html("");
                },
            });
        } else {
            getAll_administrador();
        }
    });

    function getAll_administrador() {
        $.ajax({
            url: "administradores/get_usuarios",
            type: "GET",
            dataType: "JSON",
            success: function (response) {
                let template = "";
                response.forEach((respon) => {
                    template += `
                    <tr respon="${respon.id}"> 
                        <td>${respon.cedula}</td>
                        <td>${respon.nombre}</td>
                        <td>${respon.tipo}</td>
                        <td>${respon.telefono}</td>
                        <td>${respon.correo}</td>
                        <td class="text-center">
                        <a href="administradores/show/${respon.id}"
                            class="btn btn-primary border"><i class="fas fa-eye"></i></a>
                        <a href="administradores/editar/${respon.id}"
                            class="btnedit btn btn-info border"><i class="fas fa-edit"></i></a>
                        <form action="administradores/delete/${respon.id}" method="post"
                            style="display: inline">
                            <button type="submit" class="btn btn-danger"> <i
                                    class="fas fa-trash-alt"></i></button>
                        </form>
                        </td>  
                    </tr>
                   `;
                });

                $("#tbodyadmins").html(template);
            },
        });
    }

    function getAll_docente() {
        $.ajax({
            url: "docentes/get_all_docente",
            type: "GET",
            dataType: "JSON",
            success: function (response) {
                let template = "";
                response.forEach((respon) => {
                    template += `
                        <tr respon="${respon.cedula}"> 
                            <td>${respon.cedula}</td>
                            <td>${respon.nombre_completo}</td>
                            <td>${respon.telefono}</td>
                            <td>${respon.tipo}</td>
                             <td class="text-center">
                                <button class="btn btn-primary border"><i class="fas fa-eye"></i></button>
                                <a href="docentes/editar/${respon.cedula}" class="btnedit btn btn-info border"><i class="fas fa-edit"></i></a>
                                <form action="docentes/delete/${respon.cedula}" method="post" style="display: inline">
                                    <button type="submit" class="btn btn-danger"> <i class="fas fa-trash-alt"></i></button>
                                </form>
                             </td>
                        </tr>
                   `;
                });

                $("#tbodydocente").html(template);
            },
        });
    }

    function getAll_administrativo() {
        $.ajax({
            url: "administrativos/get_all_administrativo",
            type: "GET",
            dataType: "JSON",
            success: function (response) {
                let template = "";
                response.forEach((respon) => {
                    template += `
                        <tr respon="${respon.cedula}"> 
                            <td>${respon.cedula}</td>
                            <td>${respon.nombre_completo}</td>
                            <td>${respon.telefono}</td>
                            <td>${respon.dependencia}</td>
                             <td class="text-center">
                                <button class="btn btn-primary border"><i class="fas fa-eye"></i></button>
                                <a href="administrativos/editar/${respon.cedula}" class="btnedit btn btn-info border"><i class="fas fa-edit"></i></a>
                                <form action="administrativos/delete/${respon.cedula}" method="post" style="display: inline">
                                    <button type="submit" class="btn btn-danger"> <i class="fas fa-trash-alt"></i></button>
                                </form>
                             </td>
                        </tr>
                   `;
                });

                $("#tbodyadministrativo").html(template);
            },
        });
    }

    function getAll_student() {
        $.ajax({
            url: "estudiantes/get_student",
            type: "GET",
            dataType: "JSON",
            success: function (response) {
                console.log(response);
                let template = "";
                response.forEach((respon) => {
                    template += `
                        <tr respon="${respon.id}"> 
                            <td scope="row">${respon.cedula}</td>
                            <td>${respon.nombre}</td>
                            <td>${respon.nombreprograma}</td>
                            <td class="text-center">${respon.semestre}</td>
                            <td>${respon.telefono}</td>
                             <td class="text-center">
                                <a href="estudiantes/editar/${respon.id}?view=true" class="btneye1 btn btn-primary border"><i class="fas fa-eye"></i></a>
                                <a href="estudiantes/editar/${respon.id}?edit=true" class="btnedit1 btn btn-info border"><i class="fas fa-edit"></i></a>
                                <button class="btndelet1 btn btn-danger border"><i class="fas fa-trash-alt"></i></button>
                             </td>
                        </tr>
                   `;
                });
                $(".tbody-student").html(template);
            },
        });
    }

    $(document).on("click", ".btndelet1", function () {
        if (confirm("¿Estas seguro de eliminar este estudiante?")) {
            let elemet = $(this)[0].parentElement.parentElement;
            let id = $(elemet).attr("respon");
            $.post("estudiantes/delete_student", { id }, function (response) {
                getAll_student();
            });
        }
    });

    $("#actual_contraseña").blur(function () {
        let password = $(this).val();
        console.log(password);
        $.post("perfil/validatePassword", { password }, function (respon) {
            console.log(respon);
            if (respon == "") {
                $("#actual_contraseña").focus();
                $("#actual_contraseña").addClass("is-invalid");
            } else {
                $("#actual_contraseña").removeClass("is-invalid");
            }
        });
    });

    //CRECION DE ELEMENTOS INPUT PARA INVETARIOS DINAMICOS
    $(document).on("click", "#btn-portatil", function () {
        var divs = document.createElement("div");
        var links = document.createElement("a");
        var inputs = document.createElement("input");
        inputs.setAttribute("type", "hidden");
        inputs.setAttribute("name", "portatil[]");
        let elemet = $(this)[0].parentElement.parentElement;
        inputs.setAttribute("value", $(elemet).attr("respon"));
        links.setAttribute("href", "#");
        links.setAttribute(
            "class",
            "list-group-item list-group-item-action border-1"
        );
        links.append(
            "Codigo: ",
            $(this).parents("tr").find(".portatil-codigo").html(),
            " Descripcion: ",
            $(this).parents("tr").find(".portatil-descripcion").html()
        );
        divs.append(links, inputs);
        $("#show-list-item").append(divs);
    });

    $("#selectsedes").change(function (e) {
        if ($("#selectsedes").val()) {
            let search = $("#selectsedes").val();
            $.ajax({
                url: "get_sedes",
                type: "POST",
                data: { search: search },
                dataType: "JSON",
                success: function (response) {
                    let templete = `<option value=""> -- : -- -- </option>`;
                    response.forEach((respon) => {
                        templete += `<option value="${respon.id}">${respon.nombre}</option>`;
                    });
                    $("#ubicacion").html(templete);
                },
            });
        } else {
            let templete = `<option value=""> -- : -- -- </option>`;
            $("#ubicacion").html(templete);
        }
    });

    $("#sedesedit").change(function (e) {
        if ($("#sedesedit").val()) {
            let search = $("#sedesedit").val();
            $.ajax({
                url: "http://localhost/controlmaster/inventarios/get_sedes",
                type: "POST",
                data: { search: search },
                dataType: "JSON",
                success: function (response) {
                    let templete = `<option value=""> -- : -- -- </option>`;
                    response.forEach((respon) => {
                        templete += `<option value="${respon.id}">${respon.nombre}</option>`;
                    });
                    $("#ubicacionedit").html(templete);
                },
            });
        } else {
            let templete = `<option value=""> -- : -- -- </option>`;
            $("#ubicacionedit").html(templete);
        }
    });

    $("#selectsedesprestamo").change(function (e) {
        if ($("#selectsedesprestamo").val()) {
            let search = $("#selectsedesprestamo").val();
            $.ajax({
                url: "http://localhost/controlmaster/inventarios/get_sedes",
                type: "POST",
                data: { search: search },
                dataType: "JSON",
                success: function (response) {
                    let templete = `<option value=""> -- : -- -- </option>`;
                    response.forEach((respon) => {
                        templete += `<option value="${respon.id}">${respon.nombre}</option>`;
                    });
                    $("#ubicacionprestamo").html(templete);
                },
            });
        } else {
            let templete = `<option value=""> -- : -- -- </option>`;
            $("#ubicacionprestamo").html(templete);
        }
    });

    function selectAula() {
        let search = $("#sedesedit").val();
        if (search) {
            $.ajax({
                url: "http://localhost/controlmaster/inventarios/get_sedes",
                type: "POST",
                data: { search: search },
                dataType: "JSON",
                success: function (response) {
                    let templete = "<option value=''> -- : -- -- </option>";
                    response.forEach((respon) => {
                        if (respon.id == ubicacion) {
                            templete +=
                                "<option value=" +
                                respon.id +
                                " selected>" +
                                respon.nombre +
                                "</option>";
                        } else {
                            templete +=
                                "<option value=" +
                                respon.id +
                                ">" +
                                respon.nombre +
                                "</option>";
                        }
                    });
                    $("#ubicacionedit").html(templete);
                },
            });
        } else {
            let templete = "<option value=''> -- : -- -- </option>";
            $("#ubicacionedit").html(templete);
        }
    }



    $(document).on('click', '#btnsaves', function (e) {

        for (let x = 1; x < tamano; x++) {

            if ($('#permi' + x).is(':checked')) {
                console.log('click');
            } else {
                $('#permi' + x).val('0');
            }

        }

        $('#submit').clik();
    })

    var count = 0;
    $(document).on('click', '#btnup', function (e) {
        $('#cantidad').val(count += 1);
    })

    $(document).on('click', '#btndown', function (e) {
        $('#cantidad').val(count -= 1);
    })
   
    function get_equipos() {
        $.ajax({
            url: "get_equipos_video",
            type: "GET",
            dataType: "JSON",
            success: function (response) {
                var template = "";
                response.forEach((respon) => {
                    template += `
                        <tr respon="${respon.id}"> 
                            <td scope="row">${respon.serial}</td>
                            <td>${respon.marca}</td>
                            <td>${respon.descripcion}</td>
                            <td class="text-center">${respon.estado_equipo}</td>
                             <td class="text-center">
                                <button id="btn_reserva" class="btn btn-primary border"><i class="fas fa-plus"></i></button>
                             </td>
                        </tr>
                   `;
                });
                $(".tbody-prestamos-video").html(template);
                
            }
        });
    }

    function get_equipos_p() {
        $.ajax({
            url: "get_equipos_portatil",
            type: "GET",
            dataType: "JSON",
            success: function (response) {
                var template = "";
                response.forEach((respon) => {
                    template += `
                        <tr respon="${respon.id}"> 
                            <td scope="row">${respon.serial}</td>
                            <td>${respon.marca}</td>
                            <td>${respon.descripcion}</td>
                            <td class="text-center">${respon.estado_equipo}</td>
                             <td class="text-center">
                                <button id="btn_reserva" class="btn btn-primary border"><i class="fas fa-plus"></i></button>
                             </td>
                        </tr>
                   `;
                });
                $(".tbody-prestamos-portatil").html(template);
                
            }
        });
    }

    function get_table_temporal() {
        $.ajax({
            url: "temporalTable",
            type: "GET",
            dataType: "JSON",
            success: function (response) {
                var templete1 = `
           <div class="table-responsive" style="max-height: 340px">
                <table class="table table-hover table-sm" style="white-space: nowrap">
                    <thead>
                        <tr class="table-success">
                            <th class="thead-fix" scope="col">Serial</th>
                            <th class="thead-fix" scope="col">Marca</th>
                            <th class="thead-fix" scope="col">Descripcion</th>
                            <th class="thead-fix" scope="col">Tipo</th>
                            <th class="thead-fix text-center" scope="col">Acciones</th>
                        </tr>
                    </thead>                                                            
                    <tbody class="tbody-temporal">                                                            
                    </tbody>
                </table>
            </div> 
        `;
        var templete2 = ''
            response.forEach((respon) => {
                templete2 += ` 
                <tr respon="${respon.id_equipo}"> 
                    <td scope="row">${respon.serial}</td>
                    <td>${respon.marca}</td>
                    <td>${respon.descripcion}</td>
                    <td class="text-center">${respon.tipo}</td>
                    <td class="text-center">
                        <button class="btn btn-primary border" id="btn-tmp-delete"><i class="fas fa-trash-alt"></i></button>
                    </td>
                </tr>`;
                });
            $("#container-table").html(templete1);
            $(".tbody-temporal").html(templete2);
            }
        });
    }

    $(document).on('click', '#btn_reserva', function (e) {
        
        var elemet = $(this)[0].parentElement.parentElement;
        var id = $(elemet).attr('respon');
        $.post('reservarEquipo', { id }, function (response) {
            console.log(response)
            if(response == 1){
                get_table_temporal();
                get_equipos();
                get_equipos_p();
            }
        })
    });

    $(document).on('click', '#btn_reserva_utilidad', function (e) {
        
        var elemet = $(this)[0].parentElement.parentElement;
        var id = $(elemet).attr('respon');
        $.post('reservarUtilidad', { id }, function (response) {
            console.log(response)
            if(response == 1){
               
            }
        })
    });

    $(document).on('click', '#btn-tmp-delete', function (e) {

        var elemet = $(this)[0].parentElement.parentElement;
        var id = $(elemet).attr('respon');
        $.post('delete_temporal', { id }, function (response) {
            console.log(response);
            if(response == 1){
                get_table_temporal();
                get_equipos();
                get_equipos_p();
            }
        })
    });


});
