import {FormEventHandler, useState} from 'react';
import {useForm} from "@inertiajs/react";
import LoadingSpinner from "@/Components/LoadingSpinner";
import InputError from "@/Components/InputError";
import axios from "axios";

export default function Welcome() {
    const [input, setInput] = useState('');
    const [shortUrl] = useState('');
    const [qrCode] = useState('');

    const {data, setData, post, processing, errors, reset} = useForm({
        url: '',
    });


    // const submit = async () => {
    //     let response:any = await axios.post('/generate-link',data);
    //     let data3:any = await response.json();
    //     console.log(data3);
    // }
    const submit: FormEventHandler = (e) => {
        e.preventDefault();
        post('/generate-link', {
            onSuccess: (data: any) => {
                console.log(data);
                reset();
            },
        });
    };


    return (
        <>
            <div className="min-h-screen flex items-center justify-center bg-gradient-to-tr from-blue-500 via-purple-500 to-pink-400 font-sans" dir="rtl">
                <div className="bg-white/90 shadow-2xl rounded-3xl p-10 w-full max-w-md flex flex-col items-center">
                    <h1 className="text-3xl font-extrabold text-gray-800 mb-2 tracking-tight w-full text-center">LinkFly</h1>
                    <p className="text-gray-500 mb-8 text-center w-full">
                        کوتاه‌کننده لینک سریع و مدرن<br />
                        لینک بده، کوتاه بگیر و QR بساز!
                    </p>
                    <div className="mb-3 w-full ">
                        <input
                            type="url"
                            placeholder="لینک خود را وارد کنید..."
                            className="w-full px-5 py-3 rounded-xl border border-gray-200 focus:outline-none focus:ring-2 focus:ring-pink-400 text-lg mb-0 transition text-left placeholder:text-center"
                            value={data?.url}
                            onChange={(e: any) => setData('url', e.target.value)}
                            dir="rtl"
                        />
                       <div className="flex justify-center">
                           <InputError message={errors.url} className="mt-2"/>
                       </div>
                    </div>
                    <button
                        className="w-full py-3 rounded-xl bg-gradient-to-r from-pink-500 to-purple-500 text-white font-bold text-lg shadow-lg hover:scale-105 transition mb-6 text-center flex gap-2 justify-center"
                        disabled={processing}
                        onClick={submit} // Logic to be added later
                    >
                        کوتاه کن!
                        {processing && <LoadingSpinner/>}
                    </button>
                    {/* Result Section (Placeholder) */}
                    <div className={`w-full flex flex-col items-center gap-3 mt-2 ${shortUrl || qrCode ? ' ' : 'hidden'}`} >
                        <span className="text-gray-700 font-semibold w-full text-center">لینک کوتاه شما:</span>
                        <div className="bg-gray-100 rounded-lg px-4 py-2 text-blue-600 font-mono text-left break-all select-all cursor-pointer w-full" dir="ltr">
                            {shortUrl}
                        </div>
                        <span className="text-gray-700 font-semibold mt-2 w-full text-center">QR Code:</span>
                        <div className="bg-white p-3 rounded-lg shadow flex items-center justify-center">
                            <div className="w-28 h-28 bg-gray-200 flex items-center justify-center text-gray-400 text-xs">
                                {qrCode ? "" : "---"}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <footer className="w-full text-center py-4 bg-white/40 backdrop-blur-sm text-gray-600 text-sm fixed bottom-0 left-0 z-10 shadow-inner">
                © {new Date().getFullYear()} LinkFly. همه حقوق محفوظ است.
            </footer>
        </>
    );
}
