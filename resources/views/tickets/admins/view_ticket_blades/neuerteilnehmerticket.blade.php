<table class="table" id="participant_table">
  <thead>
    <tr>
      <th scope="col">Vorname</th>
      <th scope="col">Nachname</th>
      <th scope="col">Benutzername</th>
      <th scope="col">Passwort</th>
      <th scope="col">Maßnahme</th>
      <th scope="col">Email</th>
      <th scope="col">Bemerkung</th>
    </tr>
  </thead>
  <tbody>
    @foreach($teilnehmers as $teilnehmer)
    <tr>
      <td>{{$teilnehmer->vorname}}</td>
      <td>{{$teilnehmer->nachname}}</td>
      @if(auth()->user()->hasRole('Super_Admin'))
      <td><input class="form-control password" type="text" name="username" id="{{$teilnehmer->id}}" 
                  value="{{$teilnehmer->username ? $teilnehmer->username : ''}}"></td>
      @else 
      <td>{{@$teilnehmer->username}}</td>
      @endif
      <td>{{$teilnehmer->password}}</td>
      <td>{{$teilnehmer->course}}</td>
      <td>{{$teilnehmer->email}}</td>
      <td>{{$teilnehmer->Bemerkung}}</td>
    </tr>
    @endforeach
  </tbody>
</table>



