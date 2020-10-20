var datas;
$(document).ready(function () {
    $('#programsuccess').hide();
    $('#programdanger').hide();

    getAll_user();
    getAll_student();   

    $('#user').keyup(function (e) {
        if($('#user').val()){
            let search = $('#user').val();
            $.ajax({
                url: 'getUser',
                type: 'POST',
                data: {search: search},
                dataType: 'JSON',
                success: function (response) {
                    let templete = ``;
                    response.forEach(respon =>{
                        templete += `<a href="#" id="item-data" class="list-group-item list-group-item-action border-1">${respon.nombre}</a>
                        <input type="hidden" id="idcedula" value="${respon.cedula}">`;
                    });
                    $('#show-list').html(templete);
                }
            });
        }else {
            $('#show-list').html('')
        }
    });

    $(document).on('click', '#item-data', function(e) {
        $('#user').val($(this).text());
        $('#nombre').val($(this).text());
        $('#cedula').val($('#idcedula').val());
        $('#show-list').html('');
    });
 

    $('#searchusuario').keyup(function (e) {
        if($('#searchusuario').val()){
            let search = $('#searchusuario').val();
            $.ajax({
                url: 'estudiantes/get_searchUsuario',
                type: 'POST',
                data: {search: search},
                dataType: 'JSON',
                beforeSend: function(objeto){
                    $('#loader1').html('<img src="Public/assets/icons/ajax-loader.gif"> ');
                },
                success: function (response) {
                    let template = "";
                    response.forEach(respon =>{
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
                    $('#loader1').html('');
                }

            });
        }else{
            getAll_student();
        }

    });


    $('#buscar_docente').keyup(function (e) {
        if($('#buscar_docente').val()){
            let search = $('#buscar_docente').val();
            $.ajax({
                url: 'docentes/get_search_docente',
                type: 'POST',
                data: {search: search},
                dataType: 'JSON',
                beforeSend: function(objeto){
                    $('#loader2').html('<img src="Public/assets/icons/ajax-loader.gif"> ');
                },
                success: function (response) {
                    let template = "";
                    response.forEach(respon =>{
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
                    $('#loader2').html('');
                }

            });
        }else{
            getAll_docente();
        }

    });
    

    $('#buscar_administrativo').keyup(function (e) {
        if($('#buscar_administrativo').val()){
            let search = $('#buscar_administrativo').val();
            $.ajax({
                url: 'administrativos/get_search_administrativo',
                type: 'POST',
                data: {search: search},
                dataType: 'JSON',
                beforeSend: function(objeto){
                    $('#loader3').html('<img src="Public/assets/icons/ajax-loader.gif"> ');
                },
                success: function (response) {
            
                    let template = "";
                    response.forEach(respon =>{
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
                    $('#loader3').html('');
                }

            });
        }else{
            getAll_administrativo();
        }

    });


    function getAll_user() {
        $.ajax({
            url: 'index/get_usuarios',
            type: 'GET',
            dataType: 'JSON',
            success: function (response) {
                
                let template = "";
                response.forEach(respon =>{
                    template += `
                        <tr respon="${respon.cedula}"> 
                            <td>${respon.cedula}</td>
                            <td>${respon.nombre}</td>
                            <td>${respon.tipo}</td>
                            <td>${respon.telefono}</td>
                            <td>${respon.correo}</td>
                             <td class="text-center">
                                <button class="btn btn-primary border"><i class="fas fa-eye"></i></button>
                                <button class="btn btn-info border"><i class="fas fa-edit"></i></button>
                                <button class="btn btn-danger border"><i class="fas fa-trash-alt"></i></i></button>
                             </td>
                        </tr>
                   `;
                });
                $("#tbodyusuario").html(template);
            }
        });
    }

    function getAll_docente() {
        $.ajax({
            url: 'docentes/get_all_docente',
            type: 'GET',
            dataType: 'JSON',
            success: function (response) {
                let template = "";
                response.forEach(respon =>{
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
            } 
        });
    }

    function getAll_administrativo() {
        $.ajax({
            url: 'administrativos/get_all_administrativo',
            type: 'GET',
            dataType: 'JSON',
            success: function (response) {
                let template = "";
                response.forEach(respon =>{
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
            } 
        });
    }

    function getAll_student() {
        $.ajax({
            url: 'estudiantes/get_student',
            type: 'GET',
            dataType: 'JSON',
            success: function (response) {
                let template = "";
                response.forEach(respon =>{
                    template += `
                        <tr respon="${respon.cedula}"> 
                            <td scope="row">${respon.cedula}</td>
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
            }
        });
    }


    $(document).on('click', '.btndelet1', function () {
        if(confirm('¿Estas seguro de eliminar este estudiante?')){
            let elemet = $(this)[0].parentElement.parentElement;
            let id = $(elemet).attr('respon');
            $.post('estudiantes/delete_student', {id}, function (response) {
                getAll_student();
            })
        }

    })

    $('#actual_contraseña').blur(function() {
        let password = $(this).val();
        console.log(password);
        $.post('perfil/validatePassword', {password}, function(respon) {
            console.log(respon);
            if(respon == ''){
                $('#actual_contraseña').focus();
                $('#actual_contraseña').addClass('is-invalid');
            }else{
                $('#actual_contraseña').removeClass('is-invalid');
            }
        })
    })



    //CRECION DE ELEMENTOS INPUT PARA INVETARIOS DINAMICOS
    $(document).on('click', '#btn-portatil', function () {
        var divs = document.createElement('div');
        var links = document.createElement('a');
        var inputs = document.createElement('input');
        inputs.setAttribute('type', 'hidden')
        inputs.setAttribute('name', 'portatil[]')
        let elemet = $(this)[0].parentElement.parentElement;
        inputs.setAttribute('value', $(elemet).attr('respon'))
        links.setAttribute('href', '#');
        links.setAttribute('class', 'list-group-item list-group-item-action border-1');
        links.append("Codigo: ", $(this).parents("tr").find(".portatil-codigo").html()," Descripcion: ",$(this).parents("tr").find(".portatil-descripcion").html());
        divs.append(links, inputs);
        $('#show-list-item').append(divs);
    })
    
});