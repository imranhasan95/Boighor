@extends('layouts.app')

@section('content')
  <div class="container">
      <div class="row justify-content-center">
          <div class="col-md-12">
              <div class="card">
                  <div class="card-header text-center">Dashboard</div>

                  <div class="card-body">
                      <table class="table table-bordered table-responsive text-justify">
                          <thead class="text-center">
                            <tr>
                              <th>SL NO</th>
                              <th>First Name</th>
                              <th>Last Name</th>
                              <th>Email</th>
                              <th>Web Site</th>
                              <th>Subject</th>
                              <th>Message</th>
                              <th>Time At</th>
                              <th>Uplode File</th>
                            </tr>
                          </thead>
                          <tbody class="text-justify">
                                @foreach ($contacts as $contact)
                                  <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>{{ $contact->firstname }}</td>
                                    <td>{{ $contact->lastname }}</td>
                                    <td>{{ $contact->email }}</td>
                                    <td>{{ $contact->website }}</td>
                                    <td>{{ $contact->Subject }}</td>
                                    <td>{{ $contact->message }}</td>
                                    <td>{{ $contact->created_at->diffForhumans() }}</td>
                                    <td>
                                      @if ($contact->uplode_file == 'No File')
                                        -
                                        @else
                                          {{-- <a href=" {{ asset('storage/contact_uplode') }}/{{ $contact->uplode_file }} ">Download Now</a> --}}
                                          <a href=" {!! url('contact/download') !!}/{{ $contact->uplode_file }} ">Download Now</a>
                                      @endif
                                    </td>
                                  </tr>
                                @endforeach
                          </tbody>
                        </table>
                  </div>
              </div>
          </div>
      </div>
  </div>
@endsection
