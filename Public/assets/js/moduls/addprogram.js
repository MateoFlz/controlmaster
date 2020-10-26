$(document).ready(function () {
    const URL = 'http://localhost/controlmaster/';

    let edit = false;
    let edit2 = false;
    let edit3 = false;
    let edit4 = false;

    let idprogram = '';
    let id_dependencia = '';
    let id_etiqueta = '';
    let id_aula = '';
    program_list();
    dependence_list();
    etiquetas_list();
    aulas_list();

    

    $("#programsearch").keyup(function (e) {
        if($("#programsearch").val()){
            let search =  $("#programsearch").val();
            $.ajax({
                url: 'configuracion/get_program',
                type: 'POST',
                data: {search: search},
                dataType: 'JSON',
                beforeSend: function(objeto){
                    $('#loader').html('<img src="Public/assets/icons/ajax-loader.gif"> ');
                },
                success: function (response) {
                    let template = "";
                    response.forEach(respon =>{
                        template += `
                        <tr respon="${respon.idProgramas}"> 
                            <td>${respon.idProgramas}</td>
                            <td class="text-left">${respon.nombreprograma}</td>
                             <td class="text-center">
                                <button class="btn-edit btn btn-info border"><i class="fas fa-edit"></i></button>
                                <button class="btn-delete btn btn-danger border"><i class="fas fa-trash-alt"></i></i></button>
                             </td>
                        </tr>
                   `;
                    });
                    $("#tbodyprogram").html(template).fadeIn('slow');
                    $('#loader').html('');

                }

            });
        }else{
            program_list();
        }

    });

    $("#dependenciasearch").keyup(function (e) {
        if($("#dependenciasearch").val()){
            let search =  $("#dependenciasearch").val();
            $.ajax({
                url: 'configuracion/get_dependece',
                type: 'POST',
                data: {search: search},
                dataType: 'JSON',
                beforeSend: function(objeto){
                    $('#loader').html('<img src="Public/assets/icons/ajax-loader.gif"> ');
                },
                success: function (response) {
                    let template = "";
                    response.forEach(respon =>{
                        template += `
                        <tr respon="${respon.id}"> 
                            <td>${respon.id}</td>
                            <td class="text-left">${respon.nombredependencia}</td>
                             <td class="text-center">
                                <button class="btn-edit2 btn btn-info border"><i class="fas fa-edit"></i></button>
                                <button class="btn-delete-dep btn btn-danger border"><i class="fas fa-trash-alt"></i></i></button>
                             </td>
                        </tr>
                   `;
                    });
                    $("#tbodydepencia").html(template).fadeIn('slow');
                    $('#loader').html('');

                }

            });
        }else{
            dependence_list(); 
        }

    });

    $("#etiquetasearch").keyup(function (e) {
        if($("#etiquetasearch").val()){
            let search =  $("#etiquetasearch").val();
            $.ajax({
                url: 'configuracion/get_etiquetas',
                type: 'POST',
                data: {search: search},
                dataType: 'JSON',
                beforeSend: function(objeto){
                    $('#loader').html('<img src="Public/assets/icons/ajax-loader.gif"> ');
                },
                success: function (response) {
                    let template = "";
                    response.forEach(respon =>{
                        template += `
                        <tr respon="${respon.id}"> 
                            <td>${respon.id}</td>
                            <td class="text-left">${respon.nametiqueta}</td>
                             <td class="text-center">
                                <button class="btn-edit3 btn btn-info border"><i class="fas fa-edit"></i></button>
                                <button class="btn-delete-eti btn btn-danger border"><i class="fas fa-trash-alt"></i></i></button>
                             </td>
                        </tr>
                   `;
                    });
                    $("#tbodyetiqueta").html(template).fadeIn('slow');
                    $('#loader').html('');

                }

            });
        }else{
            etiquetas_list(); 
        }

    });

    $("#aulassearch").keyup(function (e) {
        if($("#aulassearch").val()){
            let search =  $("#aulassearch").val();
            $.ajax({
                url: 'configuracion/get_aula',
                type: 'POST',
                data: {search: search},
                dataType: 'JSON',
                beforeSend: function(objeto){
                    $('#loader').html('<img src="Public/assets/icons/ajax-loader.gif"> ');
                },
                success: function (response) {
                    let template = "";
                    response.forEach(respon =>{
                        template += `
                        <tr respon="${respon.id}"> 
                        <td>${respon.id}</td>
                        <td class="">${respon.sede}</td>
                        <td class="">${respon.nombre}</td>
                        <td class="">${respon.estado}</td>
                         <td class="text-center">
                            <button class="btn-edit-aula btn btn-info border"><i class="fas fa-edit"></i></button>
                            <button class="btn-delete btn btn-danger border"><i class="fas fa-trash-alt"></i></i></button>
                         </td>
                    </tr>
                   `;
                    });
                    $("#tbodyaula").html(template).fadeIn('slow');
                    $('#loader').html('');

                }

            });
        }else{
            aulas_list();
        }

    });


    $('#formprogram').submit(function (e) {

        let postData = '';
        if(edit === true){
             postData = {
                 id: idprogram,
                 nameprogram: $('#nameprogram').val()
            };
        }else{
            postData = {
                nameprogram: $('#nameprogram').val()
            };
        }
        console.log(postData);
        let url = edit === false ? 'configuracion/insert_program' : 'configuracion/edit_program';
        $.post(url, postData, function (response) {
            console.log(response);
            if(response == true){
                $('#programsuccess').show();
            }else{
                $('#programdanger').show();
            }
            program_list();
            $('#formprogram').trigger("reset");
        });
        edit = false;
        e.preventDefault();
    });

    $('#formdependencia').submit(function (e) {

        let postData = '';
        if(edit2 === true){
             postData = {
                 id: id_dependencia,
                 namedependencia: $('#namedependencia').val()
            };
        }else{
            postData = {
                namedependencia: $('#namedependencia').val()
            };
        }
        console.log(postData);
        let url = edit2 === false ? 'configuracion/insert_dependencia' : 'configuracion/edit_dependencia';
        $.post(url, postData, function (response) {
            console.log(response);
            if(response == true){
                $('#dependencesuccess').show();
            }else{
                $('#dependencedanger').show();
            }
            dependence_list();
            $('#formdependencia').trigger("reset");
        });
        edit2 = false;
        e.preventDefault();
    });

    $('#formetiqueta').submit(function (e) {

        let postData = '';
        if(edit3 === true){
             postData = {
                 id: id_etiqueta,
                 nametiqueta: $('#nametiqueta').val()
            };
        }else{
            postData = {
                nametiqueta: $('#nametiqueta').val()
            };
        }
        console.log(postData);
        let url = edit3 === false ? 'configuracion/insert_etiqueta' : 'configuracion/edit_etiqueta';
        $.post(url, postData, function (response) {
            console.log(response);
            if(response == true){
                $('#etiquesuccess').show();
            }else{
                $('#etiquedanger').show();
            }
            etiquetas_list();
            $('#formetiqueta').trigger("reset");
        });
        edit3 = false;
        e.preventDefault();
    });

    $('#formaulas').submit(function (e) {

        let postData = '';
        if(edit4 === true){
             postData = {
                 id: id_aula,
                 nameaula: $('#nameaulas').val(),
                 sedes: $('#sedes').val(),
                 estado: $('#estado').val(),
                 activo: $('#activo').val()
            };
        }else{
            postData = {
                nameaula: $('#nameaulas').val(),
                sedes: $('#sedes').val(),
                estado: $('#estado').val()
            };
        }
        console.log(postData);
        let url = edit4 === false ? 'configuracion/insert_aula' : 'configuracion/edit_aula';
        $.post(url, postData, function (response) {
            console.log(response);
            if(response == true){
                $('#aulasuccess').show();
            }else{
                $('#auladanger').show();
            }
            aulas_list();
            $('#formaulas').trigger("reset");
        });
        edit4 = false;
        e.preventDefault();
    });

    function program_list(){
        $.ajax({
            url: 'configuracion/get_all',
            type: 'GET',
            dataType: 'JSON',
            success: function (response) {
                let template = "";
                response.forEach(respon =>{
                    template += `
                        <tr respon="${respon.idProgramas}"> 
                            <td>${respon.idProgramas}</td>
                            <td class="text-left">${respon.nombreprograma}</td>
                             <td class="text-center">
                                <button class="btn-edit btn btn-info border"><i class="fas fa-edit"></i></button>
                                <button class="btn-delete btn btn-danger border"><i class="fas fa-trash-alt"></i></i></button>
                             </td>
                        </tr>
                   `;
                });
                $("#tbodyprogram").html(template);
            }
        });
    }

    function aulas_list(){
        $.ajax({
            url: 'configuracion/get_aulas',
            type: 'GET',
            dataType: 'JSON',
            success: function (response) {
                let template = "";
                response.forEach(respon =>{
                    template += `
                        <tr respon="${respon.id}"> 
                            <td>${respon.id}</td>
                            <td class="">${respon.sede}</td>
                            <td class="">${respon.nombre}</td>
                            <td class="">${respon.estado}</td>
                             <td class="text-center">
                                <button class="btn-edit-aula btn btn-info border"><i class="fas fa-edit"></i></button>
                                <button class="btn-delete btn btn-danger border"><i class="fas fa-trash-alt"></i></i></button>
                             </td>
                        </tr>
                   `;
                });
                $("#tbodyaula").html(template);
            }
        });
    }

    function dependence_list(){
        $.ajax({
            url: 'configuracion/get_dependencia',
            type: 'GET',
            dataType: 'JSON',
            success: function (response) {
                let template = "";
                response.forEach(respon =>{
                    template += `
                        <tr respon="${respon.id}"> 
                            <td>${respon.id}</td>
                            <td class="text-left">${respon.nombredependencia}</td>
                             <td class="text-center">
                                <button class="btn-edit2 btn btn-info border"><i class="fas fa-edit"></i></button>
                                <button class="btn-delete-dep btn btn-danger border"><i class="fas fa-trash-alt"></i></i></button>
                             </td>
                        </tr>
                   `;
                });
                $("#tbodydepencia").html(template);
            }
        });
    }

    function etiquetas_list(){
        $.ajax({
            url: 'configuracion/get_etiqueta',
            type: 'GET',
            dataType: 'JSON',
            success: function (response) {
        
                let template = "";
                response.forEach(respon =>{
                    template += `
                        <tr respon="${respon.id}"> 
                            <td>${respon.id}</td>
                            <td class="text-left">${respon.nametiqueta}</td>
                             <td class="text-center">
                                <button class="btn-edit3 btn btn-info border"><i class="fas fa-edit"></i></button>
                                <button class="btn-delete-eti btn btn-danger border"><i class="fas fa-trash-alt"></i></i></button>
                             </td>
                        </tr>
                   `;
                });
                $("#tbodyetiqueta").html(template);
            }
        });
    }

    


    $(document).on('click', '.btn-edit', function () {
        $('#staticBackdrop2').modal();
        $('#nameprogram').attr('readonly', false);
        $('#programsuccess').hide();
        $('#programdanger').hide();
        let element = $(this)[0].parentElement.parentElement;
        let id = $(element).attr('respon');
        $.post('configuracion/get_programId', {id},  function (response) {
            let name = JSON.parse(response);
            idprogram = name[0]['id'];
            $('#nameprogram').val(name[0]['nombreprograma']);
            edit = true;
        })
    })

    $(document).on('click', '.btn-edit2', function () {
        $('#staticBackdrop3').modal();
        $('#namedependencia').attr('readonly', false);
        $('#dependencesuccess').hide();
        $('#dependencedanger').hide();
        let element = $(this)[0].parentElement.parentElement;
        let id = $(element).attr('respon');
        $.post('configuracion/get_dependeciaId', {id},  function (response) {
            let name = JSON.parse(response);
            id_dependencia = name[0]['id'];
            $('#namedependencia').val(name[0]['nombredependencia']);
            edit2 = true;
        })
    })

    $(document).on('click', '.btn-edit3', function () {
        $('#staticBackdrop2eti').modal();
        $('#nametiqueta').attr('readonly', false);
        $('#etiquesuccess').hide();
        $('#etiquedanger').hide();
        let element = $(this)[0].parentElement.parentElement;
        let id = $(element).attr('respon');
        $.post('configuracion/get_etiquetaId', {id},  function (response) {
            let name = JSON.parse(response);
            id_etiqueta = name[0]['id'];
            $('#nametiqueta').val(name[0]['nametiqueta']);
            edit3 = true;
        })
    })

    $(document).on('click', '.btn-edit-aula', function () {
        $('#staticBackdrop2aula').modal();
        $('#aulasuccess').hide();
        $('#auladanger').hide();
        $('.activos').show();
        let element = $(this)[0].parentElement.parentElement;
        let id = $(element).attr('respon');
        $.post('configuracion/get_aulaId', {id},  function (response) {
            let name = JSON.parse(response);
            id_aula = name[0]['id'];
            $('#nameaulas').val(name[0]['nombre']);
            $('#sedes').val(name[0]['sede']);
            $('#estado').val(name[0]['estado']);
            $('#activo').val(name[0]['activo']);
         
            edit4 = true;
        })
    })


    $(document).on('click', '.btncheck', function () {
      
        let element = $(this)[0].parentElement.parentElement;
        $('#cedula').val($(element).attr('respon'));
        $('#nombre').val($(this).parents("tr").find(".nombre").html());
    })

    let items = [
        "Mateo Florez",
        "Mario Casas",
        "Miguel Sapata",
        "Maria Isabel",
        "Isabel Acosta",
        "Carolina Carrascal",
        "Carmen Perez"
    ];



    

    $(document).on('click', '.btn-delete', function () {
        if(confirm('¿Estas seguro de eliminar este programa?')){
            let elemet = $(this)[0].parentElement.parentElement;
            let id = $(elemet).attr('respon');
            $.post('configuracion/program_delete', {id}, function (response) {
                program_list();
            })
        }

    })

    $(document).on('click', '.btn-delete-dep', function () {
        if(confirm('¿Estas seguro de eliminar esta dependencia?')){
            let elemet = $(this)[0].parentElement.parentElement;
            let id = $(elemet).attr('respon');
            $.post('configuracion/dependence_delete', {id}, function (response) {
                dependence_list();
            })
        }
    })

    $(document).on('click', '.btn-delete-eti', function () {
        if(confirm('¿Estas seguro de eliminar esta dependencia?')){
            let elemet = $(this)[0].parentElement.parentElement;
            let id = $(elemet).attr('respon');
            $.post('configuracion/etiqueta_delete', {id}, function (response) {
                dependence_list();
            })
        }
    })

    $(document).on('click', '.btn-open', function () {
        $('#nameprogram').attr('readonly', false);
        $('#nameprogram').val('');
        $('#programsuccess').hide();
        $('#programdanger').hide();
        $('#etiquesuccess').hide();
        $('#etiquesdanger').hide();
    })

    $(document).on('click', '.btn-open-eti', function () {
        $('#nametiqueta').val('');
        $('#etiquesuccess').hide();
        $('#etiquedanger').hide();
    })

    $(document).on('click', '.btn-open-aula', function () {
        $('#nameaula').val('');
        $('#sedes').val('');
        $('#estado').val('');
        $('#aulasuccess').hide();
        $('#auladanger').hide();
        $('.activos').hide();
    })

    $(document).on('click', '.btn-open-depe', function() {
        $('#namedependencia').val('');
        $('#dependencesuccess').hide();
        $('#dependencedanger').hide();
    })

});


