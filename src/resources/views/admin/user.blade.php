@extends('layouts.admin')

@section('css')
  <link rel="stylesheet" href="{{ asset('css/admin-user.css') }}">
@endsection

@section('content')
  <div class="admin">
    <div class="admin__inner">
      <form class="search" method="get">
        @csrf
        <input class="search-form__keyword-input" type="text" name="keyword" placeholder="名前やメールアドレスを入力してください" value="">
        <div class="search-form__role">
          <!-- 役割 -->
          <select class="search-form__role-select" name="" value="">
            <option disabled selected>Roles</option>
            <option value="admin">admin</option>
            <option value="user">user</option>
          </select>
        </div>
        <div class="search-form__actions">
          <input class="search-form__search-btn btn" type="submit" value="検索">
        </div>
      </form>  
      <table class="admin__table">
        <tr class="admin__row">
          <th class="admin__label_id">ID</th>
          <th class="admin__label_name">Name</th>
          <th class="admin__label_email">Email</th>
          <th class="admin__label_role">Roles</th>
          <th class="admin__label_detail">detail</th>
        </tr>      
        <tr class="admin__row">
          <td class="admin__label_id"></td>
          <td class="admin__label_name">
            <p>test</p>
          </td>
          <td class="admin__label_email"></td>
          <td class="admin__label_role"></td>
          <td class="admin__label_detail">
            <a class="admin__detail-btn" href="">詳細</a>
          </td>
        </tr>

        <div class="modal" id="">
          <a href="#!" class="modal-overlay"></a>
          <div class="modal__inner">
            <div class="modal__content">
              <form class="modal__detail-form" action="/delete" method="post">
                @csrf
                <div class="modal-form__group">
                  <label class="modal-form__label" for="">お名前</label>
                  <p></p>
                </div>

                <div class="modal-form__group">
                  <label class="modal-form__label" for="">性別</label>
                  <p>
                    
                    男性
                    
                    女性
                    
                    その他
                    
                  </p>
                </div>

                <div class="modal-form__group">
                  <label class="modal-form__label" for="">メールアドレス</label>
                  <p></p>
                </div>

                <div class="modal-form__group">
                  <label class="modal-form__label" for="">電話番号</label>
                  <p></p>
                </div>

                <div class="modal-form__group">
                  <label class="modal-form__label" for="">住所</label>
                  <p></p>
                </div>

                <div class="modal-form__group">
                  <label class="modal-form__label" for="">お問い合わせの種類</label>
                  <p></p>
                </div>

                <div class="modal-form__group">
                  <label class="modal-form__label" for="">お問い合わせ内容</label>
                  <p></p>
                </div>
                <input type="hidden" name="id" value="">
                <input class="modal-form__delete-btn btn" type="submit" value="削除">

              </form>
            </div>

            <a href="#" class="modal__close-btn">×</a>
          </div>
        </div>
      </table>
    </div>
  </div>
@endsection