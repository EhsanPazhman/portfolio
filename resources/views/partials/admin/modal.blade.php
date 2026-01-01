<!-- MODAL -->
<div id="main-modal"
    class="fixed inset-0 bg-black/90 backdrop-blur-md hidden items-center justify-center z-50 p-4 transition-all">
    <div
        class="bg-[#111827] border border-gray-800 w-full max-w-lg rounded-3xl shadow-2xl overflow-hidden scale-95 animate-in zoom-in duration-200">
        <div class="p-6 border-b border-gray-800 flex justify-between items-center bg-gray-900/40">
            <h3 class="text-xl font-bold text-white" id="modal-title">Form</h3>
            <button onclick="closeModal()" class="text-gray-500 hover:text-white text-3xl outline-none">&times;</button>
        </div>
        <div class="p-8 space-y-6">
            <div class="space-y-2">
                <label class="text-[10px] font-bold text-gray-500 uppercase tracking-[0.2em] ml-1">Input Field</label>
                <input type="text"
                    class="w-full bg-[#0b0f1a] border border-gray-800 rounded-2xl px-5 py-4 text-sm focus:outline-none focus:ring-2 focus:ring-blue-600 transition-all text-white"
                    placeholder="Type something here...">
            </div>
            <div class="flex gap-4 pt-4">
                <button onclick="closeModal()"
                    class="flex-1 px-6 py-4 rounded-2xl border border-gray-800 text-gray-400 hover:bg-gray-800 transition-all font-bold text-xs uppercase tracking-widest">Cancel</button>
                <button
                    class="flex-1 px-6 py-4 rounded-2xl bg-blue-600 hover:bg-blue-700 text-white font-bold transition-all text-xs uppercase tracking-widest shadow-xl shadow-blue-600/20">Save
                    Data</button>
            </div>
        </div>
    </div>
</div>
