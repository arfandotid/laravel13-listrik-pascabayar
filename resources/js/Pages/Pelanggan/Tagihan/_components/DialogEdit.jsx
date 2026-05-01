import { Button } from "@/Components/ui/button";
import {
    Dialog,
    DialogClose,
    DialogContent,
    DialogDescription,
    DialogFooter,
    DialogHeader,
    DialogTitle,
    DialogTrigger,
} from "@/Components/ui/dialog";
import { Field, FieldDescription, FieldLabel } from "@/Components/ui/field";
import { Input } from "@/Components/ui/input";
import { useForm } from "@inertiajs/react";
import { CreditCard } from "lucide-react";

export default function DialogEdit({ id }) {
    const { data, setData, put, processing, errors } = useForm({
        file_bukti: "",
    });

    const handleSubmit = (e) => {
        e.preventDefault();
        put("/tagihan/" + id);
    };
    return (
        <Dialog>
            <DialogTrigger asChild>
                <Button size="sm" variant="outline">
                    <CreditCard /> Bayar
                </Button>
            </DialogTrigger>
            <DialogContent>
                <DialogHeader>
                    <DialogTitle>Lakukan Pembayaran</DialogTitle>
                    <DialogDescription>
                        Upload bukti pembayaran
                    </DialogDescription>

                    <Field>
                        <FieldLabel>Bukti Pembayaran</FieldLabel>
                        <div className="flex gap-2 items-center">
                            <Input
                                type="file"
                                onChange={(e) =>
                                    setData("file_bukti", e.target.files[0])
                                }
                                accept="image/png, image/jpeg, image/jpg"
                            />
                        </div>
                        <FieldDescription className="text-xs text-gray-500 mt-1">
                            PNG / JPG, maksimal 2MB
                        </FieldDescription>
                        {errors.file_bukti && (
                            <FieldDescription className="mt-1 text-sm text-red-600">
                                {errors.file_bukti}
                            </FieldDescription>
                        )}
                    </Field>
                </DialogHeader>
                <DialogFooter>
                    <DialogClose asChild>
                        <Button variant="outline">Cancel</Button>
                    </DialogClose>
                    <Button type="submit" onClick={handleSubmit}>
                        Submit
                    </Button>
                </DialogFooter>
            </DialogContent>
        </Dialog>
    );
}
