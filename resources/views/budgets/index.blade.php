@extends('layout')
@section('title', 'eGP Stores | Budget Expenses')
@section('main-content')

<div class="main-content">
    <section class="section">
      <div class="section-body">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h4>Budget Expenditure</h4>

                <div class="card-header-action">
                    <a href="{{route('budgets.create')}}" class="btn btn-icon icon-left btn-primary"><i class="fas fa-plus"></i> Add New Record</a>
                  </div>
              </div>

              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-striped table-border" id="table-1">
                    <thead>
                      <tr class="">
                        <th class="text-center">
                          #
                        </th>
                        <th>Description</th>
                        <th>Amount</th>
                        <th>Period</th>
                        <th>Allocated to</th>
                        <th>Date Submitted</th>
                        <th>Payment Date</th>
                        <th>Status</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>

                        @foreach ($budgets as $budget)
                        @php
                            $cnt = $loop->iteration;
                        @endphp
                            @if ($budget->status == "Completed")
                            <tr class="table-success">
                            @else
                            <tr class="table-warning">
                            @endif
                                <td>{{ $cnt }}</td>
                                <td>{{ $budget->description }}</td>
                                <td>{{ number_format($budget->amount) }}</td>
                                <td>{{ $budget->budget_period }}</td>
                                <td>{{ $budget->allocated_to }}</td>
                                <td>{{ date('d-m-Y', strtotime($budget->date_submitted)) }}</td>
                                <td>
                                    @if ($budget->payment_date != null)
                                    {{ date('d-m-Y', strtotime($budget->payment_date)) }}
                                    @endif
                                </td>
                                <td>{{ $budget->status }}</td>
                                <td>
                                    <a href="{{route('budgets.edit', $budget->id )}}" title="Edit"> <i class="fas fa-pen btn btn-primary btn-sm"></i></a>
                                    <a href="" data-toggle="modal" data-target="#exampleModalCenter" data-id="{{$budget->id}}" title="Delete"> <i class="fas fa-trash btn btn-danger btn-sm"></i></a>
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
      </div>
    </section>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
      $(document).ready(function(){
          $('#exampleModalCenter').on('show.bs.modal', function (e) {
              var budget_id = $(e.relatedTarget).data('id');
              var modal = $(this);
              var formAction = "{{ route('budgets.destroy', '__id__') }}";
                formAction = formAction.replace('__id__', budget_id);
                document.getElementById('deleteForm').action = formAction;
           });
      });
      </script>

    <!-- Vertically Center -->
    <div class="modal fade del_budget" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalCenterTitle">Delete Budget Expenditure</h5>
            </div>
            <div class="modal-body">
                <p style="color:crimson">
                    Are you sure you want to delete this Expenditure entry? <br> <b>Note:</b> This action cannot be reversed.
                </p>
             <input type="hidden" class="del_budget_id" name="del_budget_id">
             </div>
             <div class="modal-footer bg-whitesmoke br">
                <form action="{{ route('budgets.destroy', '__id__') }}" method="POST" id="deleteForm">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-primary">Confirm Delete</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                </form>
             </div>

        </div>
        </div>
    </div>
 </div>
@endsection

